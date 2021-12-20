<?php
declare(strict_types=1);

require __DIR__ . "/../vendor/autoload.php";

// Get system version
function getSystemVersion()
{
	return "1";
}

// Start application
function run(string $sysVer)
{
	// Load global settings
	$settingFile = __DIR__ . "/../config/settings.php";
	if (is_readable($settingFile))
	{
		$settings = require $settingFile;
	}

	// Run the application
	$className = "Bitsmist\\v" . $sysVer . "\App";
	$bitsmist = new $className($settings);
	$bitsmist->run();
}

$sysVer = getSystemVersion();
run($sysVer);
