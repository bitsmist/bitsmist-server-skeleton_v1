<?php
return [

	// -------------------------------------------------------------------------
	//	Controllers
	// -------------------------------------------------------------------------

	"controllers" => [
		"eventController" => [
			"events" => [
				"session" => [
					"startSession" => [],
					"customHandler" => [
						"event" => "session",
					],
				],
				"connection" => [
					"connectDb" => [],
					"customHandler" => [
						"event" => "connection",
					],
				],
				"security" => [
					"headerSecurity" => [],
					"specSecurity" => [],
					"whitelistSecurity" => [],
					"customHandler" => [
						"event" => "security",
					],
				],
				"validation" => [
					"queryValidator" => [],
					"customHandler" => [
						"event" => "format",
					],
				],
				"handle" => [
					"destroySession" => [],
					"loginAuth" => [],
					"resultHandler" => [],
					"statuscodeHandler" => [],
				],
				"render" => [
					"jsonRenderer" => [],
					"customHandler" => [
						"event" => "render",
					],
				],
				"header" => [
					"extraHeader" => [],
					"originHeader" => [],
					"customHandler" => [
						"event" => "header",
					],
				],
				"disconnection" => [
					"disconnectDb" => [],
					"customHandler" => [
						"event" => "disconnection",
					],
				],
			],
		],
	],

];
