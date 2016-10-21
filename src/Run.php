<?php

spl_autoload_register(function($class) {
	$className = explode('\\',str_replace('App\\Controller\\', '', $class));
	$controller = \Tipsy\MVC\Find::find($className);
	if ($controller) {
		require_once $controller;
	}
	return true;
}, false);

$controller = function($Request) {
	$find = function($page, &$controller, &$posiblePage) {
		$pageClass = explode('/',preg_replace('/\-|_/','',$page));
		\Tipsy\MVC\Find::find($pageClass, $controller, $posiblePage);
	};

	$find($Request->path(), $controller, $posiblePage);

	if (!isset($controller) || !file_exists($controller)) {
		$find('home', $controller, $posiblePage);
	}

	require_once $controller;

	$possibleClass = explode('/', substr($posiblePage, 0, strpos($posiblePage, '.')));
	$fullPageNext = '\\App\\Controller';

	foreach ($possibleClass as $class) {
		if (!$class) {
			continue;
		}

		$fullPageNext .= '\\'.ucfirst($class);

		if (class_exists($fullPageNext, false)) {
			$c = new $fullPageNext(['tipsy' => $this->tipsy()]);
			if (method_exists($fullPageNext, 'init')) {
				$c->init();
			}
		}
	}
};

\Tipsy\Tipsy::router()
	->when('-tipsy-mvc-', $controller)
	->otherwise($controller);
