<?php 

	class Post {
		private $db;
		public function __construct() {
			$this->db = new Database;
		}

		public function allPosts() {
			$this->db->query("SELECT * FROM posts");
			$posts = $this->db->fetchAll();

			if($this->db->rowCount() > 0) {
				return $posts;
			} else {
				return false;
			}
		}
		
		public function myPosts($user_id) {
			$this->db->query("SELECT * FROM posts WHERE user_id = :user_id");
			$this->db->bind(':user_id', $user_id);

			if($myPosts = $this->db->fetchAll()) {
				return $myPosts;
			} else {
				return false;
			}
		}

		public function addPost($data) {
			$this->db->query("INSERT INTO posts (user_id, title, body) VALUES (:user_id, :title, :body)");
			$this->db->bind(':user_id', $data['user_id']);
			$this->db->bind(':title', $data['title']);
			$this->db->bind(':body', $data['body']);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function single($id) {
			$this->db->query("SELECT * FROM posts WHERE id = :id");
			$this->db->bind(':id', $id);

			$post = $this->db->single();

			if($this->db->rowCount() > 0) {
				return $post;
			} else {
				return false;
			}
		}
		public function updatePost($title, $body, $id) {
			$this->db->query("UPDATE posts SET title = :title, body = :body, created_at = :created WHERE id = :id");
			$this->db->bind(':title', $title);
			$this->db->bind(':body', $body);
			$this->db->bind(':created', date('Y-m-d H:i:s', time()));
			$this->db->bind(':id', $id);

			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}

		public function deletePost($id) {
			$this->db->query("DELETE FROM posts WHERE id = :id");
			$this->db->bind(':id', $id);
			
			if($this->db->execute()) {
				return true;
			} else {
				return false;
			}
		}
	}