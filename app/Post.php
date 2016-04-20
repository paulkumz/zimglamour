<?php

namespace twitter;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = ['body'];
     
    protected $appends = ['humanCreatedAt'];


	public function user()
	{
		return $this->belongsTo('twitter\User');
	}
	public function getHumanCreatedAtAttribute()
	{
		return $this->created_at->diffForHumans();
	}
}
