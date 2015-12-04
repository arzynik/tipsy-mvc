<?php

namespace Tipsy\MVC;

class Install {
	public static function run($event) {
		// create directories if they do not exist
		$installedPackage = $event->getComposer()->getPackage();
		var_dump($installedPackage);
		echo __DIR__;
	}
}
