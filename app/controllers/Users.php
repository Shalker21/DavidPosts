<?php 

	class Users extends Controller {
		public function __construct() {
			$this->userModel = $this->model('User');
		}

		public function register() {

			// ako je subnetirana forma
			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				// procistimo
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'first_name' => trim($_POST['first_name']),
					'last_name' => trim($_POST['last_name']),
					'username' => trim($_POST['username']),
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'confirm_password' => trim($_POST['confirm_password']),
					'first_name_err' => '',
					'last_name_err' => '',
					'username_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => ''
				];

				// validate
				if(empty($data['first_name'])) {
					$data['first_name_err'] = 'Please fill in first name';
				}
				if(empty($data['last_name'])) {
					$data['last_name_err'] = 'Please fill in last name';
				}
				if(empty($data['username'])) {
					$data['username_err'] = 'Please fill in username';
				}
				if(empty($data['email'])) {
					$data['email_err'] = 'Please fill in E-Mail address';
				} else {
					if($this->userModel->findUserByEmail($data['email'])) {
						$data['email_err'] = 'Email already exist!';
					}
				}
				if(empty($data['password'])) {
					$data['password_err'] = 'Please fill in Password';
				} else {
					if(strlen($data['password']) < 6) {
						$data['password_err'] = 'Password must have at least 6 characters!';
					}
				}
				if(empty($data['confirm_password'])) {
					$data['confirm_password_err'] = 'Please confirm passwrod';
				} else {
					if($data['confirm_password'] != $data['password']) {
						$data['confirm_password_err'] = 'Passwords does not match!';
					}
				}

				if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
					$password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
					$data['password'] = $password_hash;

					

					if($this->userModel->register($data)) {
						redirect('users/login');
					} else {
						die("NESTO JE ISPALO KRIVO!");
					}
					
				} else {
					// Ako nisu prazni errors displayamo ih
					$this->view('users/register', $data);
				}

				

			} else {
				$data = [
					'first_name' => '',
					'last_name' => '',
					'username' => '',
					'email' => '',
					'password' => '',
					'confirm_password' => '',
					'first_name_err' => '',
					'last_name_err' => '',
					'username_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => ''
				];

				$this->view('users/register', $data);
			}

		}

		public function login() {
			
			// ako je subnetirana forma
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
				// $this->logout();
				// procistimo
				$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

				$data = [
					'email' => trim($_POST['email']),
					'password' => trim($_POST['password']),
					'email_err' => '',
					'password_err' => ''
				];

				// validate
				if(empty($data['email'])) {
					$data['email_err'] = 'Please fill in E-Mail address';
				} 
				if(empty($data['password'])) {
					$data['password_err'] = 'Please fill in Password';
				} else {
					if(strlen($data['password']) < 6) {
						$data['password_err'] = 'Password must have at least 6 characters!';
					}
				}

				if(empty($data['email_err']) && empty($data['password_err'])) {
					$user = $this->userModel->login($data);
					if($user) {
						$this->userSession($user);
					} else {
						$data['password_err'] = 'Wrong Password!';
						$this->view('users/login', $data);
					}
					
				} else {
					// Ako nisu prazni errors displayamo ih
					$this->view('users/login', $data);
				}

				

			} else {
				$data = [
					'first_name' => '',
					'last_name' => '',
					'username' => '',
					'email' => '',
					'password' => '',
					'confirm_password' => '',
					'first_name_err' => '',
					'last_name_err' => '',
					'username_err' => '',
					'email_err' => '',
					'password_err' => '',
					'confirm_password_err' => ''
				];

				$this->view('users/login');
			}
			$this->view('users/login');
		}

		public function userSession($user) {
			$_SESSION['user_id'] = $user->id;
			$_SESSION['first_name'] = $user->first_name;
			$_SESSION['last_name'] = $user->last_name;
			$_SESSION['username'] = $user->username;
			$_SESSION['email'] = $user->email;
			
			redirect('posts/index');
		}
	

		public function logout() {
			unset($_SESSION['user_id']);
			unset($_SESSION['first_name']);
			unset($_SESSION['last_name']);
			unset($_SESSION['username']);
			unset($_SESSION['email']);
			session_destroy();
			
			redirect('users/login');
		}
	}