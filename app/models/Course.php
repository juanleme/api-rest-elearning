<?php

class Course extends Eloquent {

	protected $collection = 'courses';
	
	protected $primaryKey = '_id';

	protected $fillable = array('title', 'description', 'image');

	public static $rules = array('title' => 'required', 
								 'description' => 'required', 
								 'image' => '');
	
	public function videos() {
        return $this->hasMany('Video');
    }


}