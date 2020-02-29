<?php 

	class Home extends Controller {

		public function __construct() {
		
		}

		public function index() {
			$data = [
				'title' => 'DavidPosts',
				'body' => 'Share your advantures with others'
			];
			$this->view('home/index', $data);
		}

		public function about() {
			$data = [
				'about' => 'version: 1.0'
			];
			$this->view('home/about', $data);
		}
	}