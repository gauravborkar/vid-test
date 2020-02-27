<?php
	// Directory Separator
	defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

	// Website Root Path
	//defined("SITE_ROOT") ? null : define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'] . DS . "ticket" . DS);
	defined("SITE_ROOT") ? null : define("SITE_ROOT", $_SERVER['DOCUMENT_ROOT'] . DS . "viddyoze" . DS);

	// Library Path
	defined("LIB_PATH") ? null : define("LIB_PATH", SITE_ROOT . "src" . DS);

	// Class Path
	defined("CLASS_PATH") ? null : define("CLASS_PATH", LIB_PATH . "class" . DS);

	// Functions Path
	defined("FUNC_PATH") ? null : define("FUNC_PATH", LIB_PATH . "helpers" . DS);

	// Config Path
	defined("CONFIG_PATH") ? null : define("CONFIG_PATH", LIB_PATH . "config" . DS);

	// Public Controllers path
	defined("PC") ? NULL : define("PC", LIB_PATH . 'controllers' . DS . 'public' . DS);


	/**
	 * Connection constants
	 */
	define("DB_HOST", "localhost");
	define("DB_USER", "root");
	define("DB_PASS", "");
	define("DB_NAME", "viddyoze");