<?php

// Get system version
function getSystemVersion()
{
	preg_match('/v([0-9]+)-[0-9]+/', $_SERVER["REQUEST_URI"], $match);
	$sysVer = ( count($match) > 1 ? $match[1] : 1 );

	return $sysVer;
}

// Load a file for the system version
function load()
{
	$sysVer = getSystemVersion();
	require __DIR__ . "/v" . $sysVer . "/run.php";
	init($sysVer);
}

load();
