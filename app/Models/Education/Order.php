<?php

namespace App\Models\Education;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];

    public const STATUS_WAIT = 'wait';
    public const STATUS_PAID = 'paid';

    public static function statusesList(): array
    {
        return [
            self::STATUS_WAIT => 'wait',
            self::STATUS_PAID => 'paid',
        ];
    }

    public function group()
    {
        return $this->belongsTo(Group::class,'group_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function add($fields)
    {
        $group = new static;
        $group->fill($fields);
        $group->save();

        return $group;
    }

    public function markAsPaid(Carbon $carbon)
    {
        $this->update([
           'payment_time' => $carbon,
        ]);
    }

    public function isPaid()
    {
        return $this->payment_time !== NULL;
    }
}
