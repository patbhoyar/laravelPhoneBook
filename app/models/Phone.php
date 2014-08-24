<?php

class Phone extends \Eloquent {
	protected $fillable = ['phoneNumber'];

    public function user() {
        return $this->belongsTo('User');
    }
}