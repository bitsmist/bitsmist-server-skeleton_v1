<?php
unset($current["mainController"]["uses"]);

return [
	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"mainController" => [
		"uses" => [
			// Validate
			"headerValidator",
			"parameterValidator",
			// Session
			"startSessionHandler",
			// Connect
			"DBConnector",
			// Handle
			"loginAuth",
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
