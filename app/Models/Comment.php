<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 10:30:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Comment
 * 
 * @property int $comment_id
 * @property int $users_id
 * @property int $post_post_id
 * @property string $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Post $post
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Comment extends Eloquent
{
	protected $table = 'comment';
	protected $primaryKey = 'comment_id';

	protected $casts = [
		'users_id' => 'int',
		'post_post_id' => 'int'
	];

	protected $fillable = [
		'users_id',
		'post_post_id',
		'data'
	];

	public function post()
	{
		return $this->belongsTo(\App\Models\Post::class, 'post_post_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}

	/**
     * Get the data.
     *
     * @param  string  $value
     * @return array
     */
    public function getDataAttribute($value)
    {
		$data = json_decode($value, true);
		
		return $data;
		
	}
	
	/**
     * Set the data.
     *
     * @param  array  $value
     * @return void
     */
    public function setDataAttribute($value)
    {
        $this->attributes['data'] = json_encode($value);
	}
}
