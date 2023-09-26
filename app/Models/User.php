<?php

namespace App\Models;
use App\Models\Education\Group;
use App\Models\Elements\Art;
use App\Models\Elements\Photo;
use App\Models\Elements\Post;
use App\Models\Elements\Track;
use App\Models\Galleries\ArtGallery;
use App\Models\Galleries\MusicAlbum;
use App\Models\Galleries\PhotoGallery;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


/**
 * Class User
 * @package App
 * @property int $id
 * @property string $name
 * @property string $password
 * @property string $email
 * @property string $verify_token
 * @property string $status
 * @property string $role
 * @property string $avatar
 * @method static find(int $id)
 */

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    public const STATUS_BANNED = 'banned';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_WAIT = 'wait';

    public const ROLE_USER = 'user';
    public const ROLE_TEACHER = 'teacher';
    public const ROLE_MODERATOR = 'moderator';
    public const ROLE_ADMIN = 'admin';

    public static function rolesList(): array
    {
        return [
            self::ROLE_USER => 'user',
            self::ROLE_MODERATOR => 'moderator',
            self::ROLE_ADMIN => 'admin',
            self::ROLE_TEACHER => 'teacher',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name', 'email', 'age', 'real_name', 'password', 'birthday'
//    ];

      protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function arts()
    {
        return $this->hasMany(Art::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function groups()
    {
        return $this->belongsToMany(
            Group::class,
            'orders',
            'user_id',
            'group_id'
        );
    }

    public function authors()
    {
        return $this->belongsToMany(
            User::class,
            'subscribers',
            'subscriber_id',
            'author_id'
        );
    }

    public function subscribers()
    {
        return $this->belongsToMany(
            User::class,
            'subscribers',
            'author_id',
            'subscriber_id'
        );
    }


    public function artGalleries()
    {
        return $this->hasMany(ArtGallery::class);
    }

    public function photoGalleries()
    {
        return $this->hasMany(PhotoGallery::class);
    }

    public function musicGalleries()
    {
        return $this->hasMany(MusicAlbum::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->verify_token = NULL;
        $user->status = self::STATUS_ACTIVE;
        $user->save();
        return $user;
    }

    public static function register($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->verify_token = Str::random(100);
        $user->status = self::STATUS_WAIT;
        $user->save();
        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
        }
        $this->save();
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }

        $this->removeAvatar();
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    protected function removeAvatar()
    {
        if($this->avatar != null)
            Storage::delete('uploads/' . $this->avatar);
    }

    public function getAvatar()
    {
        if($this->avatar == null)
        {
            return'/img/no-user-image.jpg';
        }

        return '/uploads/' . $this->avatar;
    }

    public function setBirthdayAttribute($value)
    {
        if($value) {
            $birthday = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
            $this->attributes['birthday'] = $birthday;
        }
    }

    public function isWait(): bool
    {
        return $this->status === self::STATUS_WAIT;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isBanned(): bool
    {
        return $this->status === self::STATUS_BANNED;
    }

    public function isTeacher(): bool
    {
        return $this->role === self::ROLE_TEACHER;
    }

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isModerator(): bool
    {
        return $this->role === self::ROLE_MODERATOR;
    }

    public function isUser(): bool
    {
        return $this->role === self::ROLE_USER;
    }

    public function changeRole($role): void
    {
        if (!array_key_exists($role, self::rolesList())) {
            throw new \InvalidArgumentException('Undefined role "' . $role . '"');
        }
        if ($this->role === $role) {
            throw new \DomainException('Role is already assigned.');
        }
//        $this->update(['role' => $role]);
        $this->role = $role;
        $this->save();
    }

    public function verify(): void
    {
        if (!$this->isWait()) {
            throw new \DomainException('User is already verified.');
        }

        $this->verify_token = null;
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }

    public function ban()
    {
        $this->status = User::STATUS_BANNED;
        $this->save();
    }

    public function unban()
    {
        $this->status = User::STATUS_ACTIVE;
        $this->save();
    }

    public function toggleBan()
    {
        if($this->status === User::STATUS_BANNED)
        {
            return $this->unban();
        }
        else
            return $this->ban();
    }

    public function makeTeacher()
    {
        $this->role = User::ROLE_TEACHER;
        $this->save();
    }

    public function unmakeTeacher()
    {
        $this->role = User::ROLE_USER;
        $this->save();
    }

    public function toggleTeacher()
    {
        if($this->role === User::ROLE_TEACHER)
        {
            return $this->unmakeTeacher();
        }
        else
            return $this->makeTeacher();
    }

    public function hasPaid($groupId)
    {
        return $this->groups()->find($groupId);
    }

    public static function getAllTeachers()
    {
        return self::where('role', 'teacher')->get()->pluck('name', 'id');
    }

    public function getCommentsCount()
    {
        return $this->comments()->count();
    }

    public function getViewsCount()
    {
        $viewsCount = 0;
        $posts = $this->posts->all();
        $arts = $this->arts->all();

        foreach ($posts as $post) {
            $viewsCount += $post->getViews();
        }

        foreach ($arts as $art) {
            $viewsCount += $art->getViews();
        }

        return $viewsCount;
    }

    public function subscribe($id)
    {
        if ($this->isSubscribed($id)) {
            throw new \DomainException('Вы уже подписаны на этого автора');
        }
        $this->authors()->attach($id);
    }

    public function isSubscribed($id): bool
    {
        return $this->authors()->where('id', $id)->exists();
    }

    public function getSubscribersCount()
    {
        return $this->subscribers()->count();
    }

}
