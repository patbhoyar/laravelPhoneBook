<?php

class Address extends \Eloquent {
	protected $fillable = ['line1', 'line2', 'city', 'state', 'country', 'zipcode'];


    public function user() {
        return $this->belongsTo('User');
    }
}