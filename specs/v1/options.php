<?php
return [

	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

	"options" => [
		"needPreflight" => false,
	],

	// -------------------------------------------------------------------------
	//	Controllers
	// -------------------------------------------------------------------------

	"controllers" => [
		"eventController" => [
			"events" => [
				"session" => [
					"startSession" => [],
				],
				"security" => [
					"headerSecurity" => [],
				],
				"header" => [
					"extraHeader" => [
						"extraHeaders" => [
							"Access-Control-Allow-Methods" => "GET, POST, PUT, DELETE, PATCH, OPTIONS",
							"Access-Control-Allow-Headers" => "X-Requested-With, Content-Type, Accept, Origin, Authorization, X-From",
						],
					],
					"originHeader" => [],
				],
			],
		],
	],

];
