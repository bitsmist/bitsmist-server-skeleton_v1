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
			//"requiredHeaderValidator",
			"parameterValidator",
			// Session
			"startSessionHandler",
			// Connect
			"DBConnector",
			// Handle
			"loginAuth",
			"customMiddlewareHandler",
			"resultHandler",
			"statuscodeHandler",
			// Render
			"jsonRenderer",
			// Build header
			"extraHeaderBuilder",
			"originHeaderBuilder",
			// Disconnect
			"DBDisconnector",
		],
	],
];
