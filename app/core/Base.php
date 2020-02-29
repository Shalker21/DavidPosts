<?php
	
	class Base {
		// pocetni parametri
		protected $curentController = 'Home';
		protected $curentMethod = 'Index';
		protected $params = [];

		public function __construct() {
			$url = $this->getUrl();
			
			if(file_exists('../app/controllers/'. $url[0] .'.php')) {
				$this->curentController = ucwords($url[0]);
				unset($url[0]);
			}

			// otvaramo kontroler da mozemo stvoriti objekt
			require_once '../app/controllers/'. $this->curentController .'.php';

			// Instanciramo objekt
			$this->curentController = new $this->curentController;

			if(isset($url[1])) {
				if(method_exists($this->curentController, $url[1])) {
					$this->curentMethod = $url[1];
				}
			}

			// parametri 
			$this->params = $url ? array_values($url) : [];

			// Callback funkcija
			call_user_func_array([$this->curentController, $this->curentMethod], $this->params);

		}

		public function getUrl() {
			if(isset($_GET['url'])) {
				$url = explode('/', filter_var(trim($_GET['url'], '/'), FILTER_SANITIZE_URL));
				return $url;
			}
		}
	}
