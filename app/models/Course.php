<?php

class Course extends Eloquent {

	protected $collection = 'courses';

	protected $fillable = array('title', 'description', 'image');

	public static $rules = array('title' => 'required', 
								 'description' => 'required', 
								 'image' => '');

}