<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 10:30:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $api_token
 * 
 * @property \Illuminate\Database\Eloquent\Collection $comments
 * @property \Illuminate\Database\Eloquent\Collection $messages
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $hidden = [
		'password',
		'remember_token',
		'api_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'remember_token',
		'api_token'
	];

	public function comments()
	{
		return $this->hasMany(\App\Models\Comment::class, 'users_id');
	}

	public function messages()
	{
		return $this->hasMany(\App\Models\Message::class, 'sender_id');
	}

	public function posts()
	{
		return $this->hasMany(\App\Models\Post::class, 'users_id');
	}
}
