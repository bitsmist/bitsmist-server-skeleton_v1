<?php
unset($current["mainController"]["uses"]);

return [
	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"mainController" => [
		"uses" => [
			// Validate
			"hostHeaderValidator",
			"originHeaderValidator",
			"requiredHeaderValidator",
			// Session
			"startSessionHandler",
			"destroySessionHandler",
			// Handle
			"customMiddlewareHandler",
			"resultHandler",
			"statuscodeHandler",
			// Render
			"jsonRenderer",
			// Build header
			"extraHeaderBuilder",
			"originHeaderBuilder",
		],
	],
];
