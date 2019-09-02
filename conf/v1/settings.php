<?php
return [

	// Options
    "options" => [
        "showErrors" => true,
		"rootDir" => __DIR__ . "/../../",
		"sitesDir" => __DIR__ . "/../../sites/v1/",
    ],

	// Loader
	"loader" => [
		"class" => "\Bitsmist\\v1\Plugins\Loader\DefaultLoader",
	],

	// Router
	"router" => [
		"class" => "",
		"routes" => [
			"default" => [
				"route" =>"/v{sysVersion}-{appVersion}/{resource}/{id}.{format}",
				"handler" => "default",
			],
			"withAppName" => [
				"route" => "/{appName}/v{sysVersion}-{appVersion}/{resource}/{id}.{format}",
				"handler" => "default",
			],
			"favicon" => [
				"route" => "/favicon.ico",
				"handler" => "reject",
				"status" => "204",
			]
		],
	],

	// Request
	"request" => [
		"class" => "\Zend\Diactoros\ServerRequestFactory",
	],

	// Response
	"response" => [
		"class" => "\Zend\Diactoros\Response",
	],

];
