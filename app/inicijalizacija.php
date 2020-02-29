<?php 
	// require config (Base varijable)
	require_once 'config/config.php';

	require_once 'helpers/simple_helpers.php';

	require_once 'helpers/session_helper.php';

	// require_once 'core/Controller.php';
	// require_once 'core/Base.php';
	// require_once 'core/Database.php';

	// autoload core files
	spl_autoload_register(function($className) {
		require_once 'core/'. $className .'.php';
	});