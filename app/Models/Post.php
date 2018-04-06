<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 10:30:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 * 
 * @property int $post_id
 * @property int $users_id
 * @property string $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $comments
 *
 * @package App\Models
 */
class Post extends Eloquent
{
	protected $table = 'post';
	protected $primaryKey = 'post_id';

	protected $casts = [
		'users_id' => 'int'
	];

	protected $fillable = [
		'users_id',
		'data'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'users_id');
	}

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class, 'post_post_id');
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
