<?php 

	class Controller {
		public function view($view, $data = []) {
			if(file_exists('../app/view/'. $view .'.php')) {
				require_once '../app/view/'. $view .'.php';
			} else {
				// Ne postoji view
				die('View Does Not Exist');
			}
		}

		public function model($model) {
			if(file_exists('../app/models/'. $model .'.php')) {
				require_once '../app/models/'. $model .'.php';

				// instanciramo model jer je model klasa
				return new $model();
			} else {
				// Ne postoji model
				die('Model Does Not Exist');
			}
		}
	}