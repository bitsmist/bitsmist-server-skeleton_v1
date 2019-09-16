<?php
return [

	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

	"options" => [
		"needPreflight" => true,
	],

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
				"format" => [
					"queryFormatter" => [],
					"customHandler" => [
						"event" => "format",
					],
				],
				"authorization" => [
					"sessionAuthorizor" => [],
					"customHandler" => [
						"event" => "authorization",
					],
				],
				"handle" => [
					"autoHandler" => [
						"handlers" => [
							"default" => "modelHandler",
							"custom" => "customHandler",
						],
					],
					"dataFormatter" => [],
					"paginationHandler" => [],
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

	// -------------------------------------------------------------------------
	//	Exceptions
	// -------------------------------------------------------------------------

	"exceptions" => [
		"basicExceptionHandler" => [],
		"loggingExceptionHandler" => [],
		"statuscodeHandler" => [],
		"resultHandler" => [],
		"jsonRenderer" => [],
		"extraHeader" => [],
		"originHeader" => [],
//		"echoExceptionHandler" => [],
	],

	// -------------------------------------------------------------------------
	//	Loggers
	// -------------------------------------------------------------------------

	"loggers" => [
		"debug" => [],
	],

	// -------------------------------------------------------------------------
	//	Emitters
	// -------------------------------------------------------------------------

	"emitters" => [
		"httpEmitter" => [],
	],

];
