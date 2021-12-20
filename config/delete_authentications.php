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
			// Session
			"startSessionHandler",
			"destroySessionHandler",
			// Handle
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
