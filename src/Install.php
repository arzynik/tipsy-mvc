<?php

namespace Tipsy\MVC;

class Install {
	public static function run($event = null) {
		// copy files if they do not exist

		$src = realpath(__DIR__.'/../boilerplate');
		$dst = realpath(__DIR__.'/../../../../');

		if (!$src) {
			throw new \Exception('Could not find tipsy-mvc/boilerplate');
		}
		if (!$dst) {
			throw new \Exception('Lost in tipsy-mvc/boilerplate');
		}

		$objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($src), \RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object){
			if (substr($object->getFilename(), 0, 1) == '.') {
				continue;
			}
			$file = str_replace($src, '', $object->getPathname());

			if (!file_exists($dst.$file)) {
				if ($object->isDir()) {
					mkdir($dst.$file);
				} else {
					copy($object->getPathname(), $dst.$file);
				}
			}
		}
	}
}
