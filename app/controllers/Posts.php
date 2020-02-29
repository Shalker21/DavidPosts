<?php 

	class Posts extends Controller {
		public function __construct() {
			$this->postModel = $this->model('Post');
			$this->userModel = $this->model('User');
		}

		public function index() {
			$data = [
				'title' => 'David Posts First Page'
			];

			$this->view('posts/index', $data);
		}

		public function about() {
			$data = [
				'about' => 'version: 1.0'
			];
			$this->view('posts/about', $data);
		}

		public function profile() {
			$users = $this->userModel->allUsers();

			$data = [
				'users' => $users
			];

			$this->view('posts/profile', $data);
		}

		public function allPosts() {
			$posts = $this->postModel->allPosts(); 
			$users = $this->userModel->allUsers();

			$data = [
				'post' => $posts,
				'user' => $users
			];

			$this->view('posts/allPosts', $data);
		}

		public function myPosts() {
			$posts = $this->postModel->myPosts($_SESSION['user_id']); 
			$users = $this->userModel->allUsers();

			$data = [
				'post' => $posts,
				'user' => $users
			];

			$this->view('posts/myPosts', $data);
		}

		public function single() {
			$id = substr($_GET['url'], -1);

			$single = $this->postModel->single($id);
			$users = $this->userModel->allUsers();

			$data = [
				'single' => $single,
				'users' => $users
			];

			$this->view('posts/single', $data);
		}

		public function addPost() {
			// Ako je forma submitana
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				$data = [
					'user_id' => $_SESSION['user_id'],
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
					'title_err' => '',
					'body_err' => ''
				];

				if(empty($data['title'])) {
					$data['title_err'] = 'Please, fill in title';
				}

				// validate
				if(empty($data['body'])) {
					$data['body_err'] = 'Please, fill in body';
				}

				if($this->postModel->addPost($data)) {
					$this->view('posts/addPost', $data);
				}
				
			} else {
				$data = [
					'post_id' => substr($_GET['url'], -1),
					'title' => '',
					'body' => '',
					'title_err' => '',
					'body_err' => ''
				];

				$this->view('posts/addPost', $data);
			}
		}

		// when we press button for edit in single view, we use that function just for show data in elements
		public function editPost() {
			$id = substr($_GET['url'], -1);
			$single = $this->postModel->single($id);

			$data = [
				'single' => $single,
				'title_err' => '',
				'body_err' => ''
			];

			
			$this->view('posts/editPost', $data);
		}

		// function used for update post
		// Provjeriti funkcionalnost!
		public function updatePost() {
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$data = [
					'id' => $_POST['hidden_id_of_post'],
					'title' => trim($_POST['title']),
					'body' => trim($_POST['body']),
				];

				if($this->postModel->updatePost($data['title'], $data['body'], $data['id'])) {
					$single = $this->postModel->single($data['id']);
					$users = $this->userModel->allUsers();
	
					$singleData = [
						'single' => $single,
						'users' => $users 
					];
	
					$data = $data + $singleData;

					$this->view('posts/single', $data);
				}				
			}
		}

		public function deletePost() {
			$id = substr($_GET['url'], -1);
			// Ako je usmjesno obrisani
			if($this->postModel->deletePost($id)) {
	
				$posts = $this->postModel->allPosts(); 
				$users = $this->userModel->allUsers();

				$_SESSION['deleted_post_id'] = $id;

				$data = [
					'deleted_post_id' => $_SESSION['deleted_post_id'],
					'post' => $posts,
					'user' => $users
				];

				$this->view('posts/allPosts', $data);
			}
		}

		// Function for Hide Post
		// public function hidePost() {
		// 	$id = substr($_GET['url'], -1);
			
		// 	$single = $this->postModel->single($id);
		// 	$posts = $this->postModel->myPosts($_SESSION['user_id']); 
		// 	$users = $this->userModel->allUsers();

		// 	$_SESSION['hidden_post_id'] = $single->id;
		// 	$data = [
		// 		'hidden_post_id' => $_SESSION['hidden_post_id'],
		// 		'single' => $single,
		// 		'posts' => $posts,
		// 		'users' => $users
		// 	];

			
		// 	$this->view('posts/myPosts', $data);
		// }
	}