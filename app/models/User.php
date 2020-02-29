<?php

	class User {
		private $db;

		// konektamo na bazu
		public function __construct() {
			$this->db = new Database;
		}

		public function register($data) {
			$this->db->query(
							 "INSERT INTO users 
							(
							  first_name,
							  last_name,
							  username,
							  email,
							  password
							)
							  VALUES
							( 
							  :first,
							  :last,
							  :uname,
							  :email,
							  :pass
							)"
							);

			$this->db->bind(':first', $data['first_name']);
			$this->db->bind(':last', $data['last_name']);
			$this->db->bind(':uname', $data['username']);
			$this->db->bind(':email', $data['email']);
			$this->db->bind(':pass', $data['password']);

			if($this->db->execute()) {

				return true;
			
			} else {
			
				return false;
			
			}
		}

		public function login($data) {
			$this->db->query("SELECT * FROM users WHERE email = :email");
			$this->db->bind(':email', $data['email']);

			$user = $this->db->single();
			$data['password'] = password_verify($data['password'], $user->password);

			if($data['password']) {
				return $user;
			} else {
				return false;
			}
		}

		public function findUserByEmail($email) {
			$this->db->query("SELECT * FROM users WHERE email = :email");
			$this->db->bind(':email', $email);
			
			$this->db->fetchAll();
			if($this->db->rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}

		public function findPostByUserId($userId) {
			$this->db->query("SELECT * FROM posts WHERE id = :user_id");
			$this->db->bind(':user_id', $userId);

			$user = $this->db->single();

			if($this->db->rowCount() > 0) {
				return $user;
			} else {
				return false;
			}
		}

		public function allUsers() {
			$this->db->query("SELECT * FROM users");
			$users = $this->db->fetchAll();

			if($this->db->rowCount() > 0) {
				return $users;
			} else {
				return false;
			}
		}
	}