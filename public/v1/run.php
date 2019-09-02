<?php
declare(strict_types=1);

ini_set("display_errors", "0");
ini_set("display_startup_errors", "0");
ini_set("error_reporting", (string)E_ALL);
error_reporting(E_ALL);

require __DIR__ . '/../../vendor/autoload.php';

function init(string $sysVer)
{
	// Load global settings
	$settings = array();
	$settingFile = __DIR__ . '/../../conf/v' . $sysVer . '/settings.php';
	if (is_readable($settingFile))
	{
		$settings = require $settingFile;
	}
	$settings["version"] = $sysVer;

	// Run the application
	$className = "Bitsmist\\v" . $sysVer . "\App";
	$bitsmist = new $className($settings);
	$bitsmist->run();
}
