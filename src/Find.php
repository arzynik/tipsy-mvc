<?php

namespace Tipsy\MVC;

class Find {
	public static function find($pageClass, &$controller = null, &$posiblePage = null) {
		$controllers = __DIR__.'/../../../../app/controllers/';

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
	}
}
