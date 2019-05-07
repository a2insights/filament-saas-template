<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 *
 * @property int $id
 * @property string $name
 * @property int $user_id
 * @property int $blog_id
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\Blog $blog
 * @property \App\Models\User $author
 * @property \Illuminate\Database\Eloquent\Collection $tags
 *
 * @package App\Models
 */
class Post extends Eloquent
{
    /**
     * @var array
     */
    protected $casts = [
		'user_id' => 'int',
		'blog_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'name',
		'user_id',
		'blog_id',
		'content'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
	{
		return $this->belongsTo(\App\Models\User::class , 'user_id');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class, 'post_has_tags')
					->withPivot('id');
	}
}
