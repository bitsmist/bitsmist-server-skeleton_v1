<?php
unset($current["mainController"]["uses"]);

return [
	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

	"options" => [
		"extraHeaders" =>[
			"Access-Control-Allow-Headers" => "Content-Type, Authorization, X-Requested-With",
			"Access-Control-Allow-Methods" => "GET, POST, PUT, DELETE, OPTIONS",
			"Access-Control-Max-Age" => "86400",
		],
	],

	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"mainController" => [
		"uses" => [
			// Validate
			"hostHeaderValidator",
			"originHeaderValidator",
			"requiredHeaderValidator",
			// Handle
			"customMiddlewareHandler",
			// Build header
			"extraHeaderBuilder",
			"originHeaderBuilder",
		]
	],
];
