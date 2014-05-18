<?php

class Meal extends \Eloquent {
	protected $table = 'meal';
	protected $guarded = [];
	public function user()
    {
        return $this->belongsTo('User', 'user_id','id');
    }
}