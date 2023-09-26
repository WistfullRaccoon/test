<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Category
 *
 * @package App
 * @property $preview
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Subcategory[] $subcategory
 * @property-read int|null $subcategory_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property string $text
 * @property int $type
 * @property int $status
 * @property int $author_id
 * @property int $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Comment whereUpdatedAt($value)
 */
	class Comment extends \Eloquent {}
}

namespace App\Models\Education{
/**
 * App\Models\Education\Course
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property string|null $image
 * @property string $status
 * @property int $subcategory_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \App\Models\Subcategory $subcategory
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Course whereUpdatedAt($value)
 */
	class Course extends \Eloquent {}
}

namespace App{
/**
 * App\Dialog
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dialog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dialog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Dialog query()
 */
	class Dialog extends \Eloquent {}
}

namespace App\Models\Education{
/**
 * App\Models\Education\Group
 *
 * @property-read \App\Models\Education\Course $course
 * @property-read \App\Models\User|null $teacher
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Education\Group query()
 */
	class Group extends \Eloquent {}
}

namespace App\Models\Elements{
/**
 * App\Models\Elements\Art
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property string $slug
 * @property string $description
 * @property int|null $user_id
 * @property int|null $subcategory_id
 * @property int|null $artGallery_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property int $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $date
 * @property-read \App\Models\User|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read \App\Models\Subcategory|null $subcategory
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereArtGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Art withAnyTagsOfAnyType($tags)
 */
	class Art extends \Eloquent {}
}

namespace App\Models\Elements{
/**
 * App\Models\Elements\Photo
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property string $slug
 * @property int|null $user_id
 * @property int|null $subcategory_id
 * @property int|null $artGallery_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property int $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $date
 * @property string|null $description
 * @property-read \App\Models\User|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read \App\Models\Subcategory|null $subcategory
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereArtGalleryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Photo withAnyTagsOfAnyType($tags)
 */
	class Photo extends \Eloquent {}
}

namespace App\Models\Elements{
/**
 * Class Post
 *
 * @package App
 * @property int $id
 * @property int $user_id
 * @property int $subcategory_id
 * @property string $title
 * @property string $content
 * @property string $date
 * @property string $image
 * @property string $status
 * @property string $slug
 * @property string|null $description
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property int $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Tags\Tag[] $tags
 * @property-read \App\Models\Subcategory|null $subcategory
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post forUser(\App\Models\User $user)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post whereViews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post withAllTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post withAllTagsOfAnyType($tags)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post withAnyTags($tags, $type = null)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Post withAnyTagsOfAnyType($tags)
 */
	class Post extends \Eloquent {}
}

namespace App\Models\Elements{
/**
 * App\Models\Elements\Track
 *
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property int|null $user_id
 * @property int|null $subcategory_id
 * @property int|null $musicAlbum_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property int $is_featured
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereMusicAlbumId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Elements\Track whereViews($value)
 */
	class Track extends \Eloquent {}
}

namespace App\Models\Galleries{
/**
 * App\Models\Galleries\ArtGallery
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $preview
 * @property string $slug
 * @property int $author_id
 * @property int|null $subcategory_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\ArtGallery whereViews($value)
 */
	class ArtGallery extends \Eloquent {}
}

namespace App\Models\Galleries{
/**
 * App\Models\Galleries\MusicAlbum
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $preview
 * @property string $slug
 * @property int $author_id
 * @property int|null $subcategory_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\MusicAlbum whereViews($value)
 */
	class MusicAlbum extends \Eloquent {}
}

namespace App\Models\Galleries{
/**
 * App\Models\Galleries\PhotoGallery
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $preview
 * @property string $slug
 * @property int $author_id
 * @property int|null $subcategory_id
 * @property int $views
 * @property int $likes
 * @property int $reposts
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereLikes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereReposts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereSubcategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Galleries\PhotoGallery whereViews($value)
 */
	class PhotoGallery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subcategory
 *
 * @property int $id
 * @property string $title
 * @property string|null $preview
 * @property int $category_id
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Art[] $arts
 * @property-read int|null $arts_count
 * @property-read \App\Models\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education\Course[] $courses
 * @property-read int|null $courses_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Track[] $tracks
 * @property-read int|null $tracks_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subcategory whereUpdatedAt($value)
 */
	class Subcategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Subscriber
 *
 * @property int $id
 * @property int $author_id
 * @property int $subscriber_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber whereSubscriberId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Subscriber whereUpdatedAt($value)
 */
	class Subscriber extends \Eloquent {}
}

namespace App\Models{
/**
 * Class User
 *
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
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $real_name
 * @property string|null $birthday
 * @property int $is_teacher
 * @property int $is_admin
 * @property string|null $biography
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galleries\ArtGallery[] $artGalleries
 * @property-read int|null $art_galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Art[] $arts
 * @property-read int|null $arts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Education\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galleries\MusicAlbum[] $musicGalleries
 * @property-read int|null $music_galleries_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Galleries\PhotoGallery[] $photoGalleries
 * @property-read int|null $photo_galleries_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Photo[] $photos
 * @property-read int|null $photos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Post[] $posts
 * @property-read int|null $posts_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Elements\Track[] $tracks
 * @property-read int|null $tracks_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBiography($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereIsTeacher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRealName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereVerifyToken($value)
 */
	class User extends \Eloquent {}
}

