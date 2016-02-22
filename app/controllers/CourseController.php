<?php

class CourseController extends BaseController {

	public function index() {
		return Course::all();
	}

}
