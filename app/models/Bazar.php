<?php

class Bazar extends \Eloquent {
	protected $table = 'bazar';
	protected $guarded = [];

	public function user()
    {
        return $this->belongsTo('User', 'user_id','id');
    }
}