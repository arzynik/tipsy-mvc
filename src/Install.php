<?php

namespace Tipsy\MVC;

class Install {
	public static function run($event = null) {
		// create directories if they do not exist


		$path = realpath(__DIR__.'/../../../../');

		$objects = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path), \RecursiveIteratorIterator::SELF_FIRST);
		foreach($objects as $name => $object){
			echo "$name\n";
			echo $object->getPathname()."\n";
		}

	}
}

Install::run();
