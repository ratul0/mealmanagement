<?php

class Payment extends \Eloquent {
	protected $table = 'payment';
	protected $guarded = [];
	public function user()
    {
        return $this->belongsTo('User', 'user_id','id');
    }
}