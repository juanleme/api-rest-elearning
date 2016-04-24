<?php

class CourseController extends BaseController {

	public function index() {
		return Course::all();
	}
	public function videos($id) {
		$videos = Course::find($id)->videos;

		return ApiResponse::json($videos);
	}
}
