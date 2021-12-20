<?php
unset($current["mainController"]["uses"]);

return [
	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

	"options" => [
		"extraHeaders" =>[
			"Access-Control-Allow-Credentials" => "true",
			"Access-Control-Max-Age" => "600",
			"Access-Control-Allow-Methods" => "GET, POST, PUT, DELETE, PATCH, OPTIONS",
			"Access-Control-Allow-Headers" => "",
		],
	],

	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"mainController" => [
		"uses" => [
			// Validate
			"headerValidator",
			// Session
			"startSessionHandler",
			// Build header
			"extraHeaderBuilder",
			"originHeaderBuilder",
		]
	],
];
