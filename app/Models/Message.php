<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 06 Apr 2018 10:30:53 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $message_id
 * @property int $sender_id
 * @property int $receiver_id
 * @property string $data
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	protected $table = 'message';
	protected $primaryKey = 'message_id';

	protected $casts = [
		'sender_id' => 'int',
		'receiver_id' => 'int'
	];

	protected $fillable = [
		'sender_id',
		'receiver_id',
		'data'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'sender_id');
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
