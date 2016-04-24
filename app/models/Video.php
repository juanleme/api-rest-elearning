<?php

class Video extends Eloquent {

	protected $collection = 'videos';
	
	protected $primaryKey = '_id';

	protected $fillable = array('url', 'type', 'poster', 'title','course_id');

	public static $rules = array('url' => 'required', 
								 'type' => 'required', 
								 'poster' => '',
								 'title', 'required',
								 'course_id' => 'required');

    public function course() {
    	return $this->belongsTo('Course');
    }

}