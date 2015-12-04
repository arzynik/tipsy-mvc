<?php
die('test');
Tipsy::router()
	->otherwise(function($Request) {

		$find = function($page, &$controller, &$posiblePage) {

			$pageClass = explode('/',$page);
			$controllers = __DIR__.'/../../../app/controllers/';

			foreach ($pageClass as $posiblePage) {
				$posiblePages[] = $fullPageNext.'/'.$posiblePage.'.php';
				$posiblePages[] = $fullPageNext.'/'.$posiblePage.'/index.php';
				$fullPageNext .= '/'.$posiblePage;
			}
			$posiblePages = array_reverse($posiblePages);

			foreach ($posiblePages as $posiblePage) {
				if (file_exists($controllers.$posiblePage)) {
					$controller = $controllers.$posiblePage;
					break;
				}
			}

			return $controller;
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
	});
