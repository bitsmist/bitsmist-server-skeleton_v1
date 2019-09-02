<?php
return [

	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

    "options" => [
        "showErrors" => true,
		"rootDir" => __DIR__ . "/../../",
		"sitesDir" => __DIR__ . "/../../sites/v1/",
    ],

	// -------------------------------------------------------------------------
	//	Loader
	// -------------------------------------------------------------------------

	"loader" => [
		"class" => "\Bitsmist\\v1\Plugins\Loader\DefaultLoader",
	],

	// -------------------------------------------------------------------------
	//	Router
	// -------------------------------------------------------------------------

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

	// -------------------------------------------------------------------------
	//	Request
	// -------------------------------------------------------------------------

	"request" => [
		"class" => "\Zend\Diactoros\ServerRequestFactory",
	],

	// -------------------------------------------------------------------------
	//	Response
	// -------------------------------------------------------------------------

	"response" => [
		"class" => "\Zend\Diactoros\Response",
	],

	// -------------------------------------------------------------------------
	//	Controllers
	// -------------------------------------------------------------------------

	"controllers" => [
		"eventController" => [
			"class" => "Bitsmist\\v1\Plugins\Controller\EventController",
		],
	],

	// -------------------------------------------------------------------------
	//	Middlewares
	// -------------------------------------------------------------------------

	"middlewares" => [
		// Session

		"phpSession" => [
			"class" => "Bitsmist\\v1\Middlewares\Session\PhpSession",
		],

		// Connection

		"connectDb" => [
			"class" => "Bitsmist\\v1\Middlewares\Connection\ConnectDb",
		],

		"disconnectDb" => [
			"class" => "Bitsmist\\v1\Middlewares\Connection\DisconnectDb",
		],

		// Security

		"headerSecurity" => [
			"class" => "Bitsmist\\v1\Middlewares\Security\HeaderSecurity",
		],

		"specSecurity" => [
			"class" => "Bitsmist\\v1\Middlewares\Security\SpecSecurity",
		],

		"whitelistSecurity" => [
			"class" => "Bitsmist\\v1\Middlewares\Security\WhitelistSecurity",
		],

		// Authorizer

		"sessionAuthorizor" => [
			"class" => "Bitsmist\\v1\Middlewares\Authorizer\SessionAuthorizer",
		],

		// Formatter

		"queryFormatter"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Formatter\QueryFormatter",
		],

		"dataFormatter"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Formatter\DataFormatter",
		],

		// Renderer

		"jsonRenderer"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Renderer\JsonRenderer",
		],

		// Header builder

		"extraHeader"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Header\ExtraHeader",
		],

		"originHeader"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Header\OriginHeader",
		],

		// Handler

		"autoHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\AutoHandler",
		],

		"modelHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\ModelHandler",
		],

		"customHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\CustomHandler",
		],

		"paginationHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\PaginationHandler",
		],

		"resultHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\ResultHandler",
		],

		"statuscodeHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Handler\StatuscodeHandler",
		],

		// Exception handler

		"basicExceptionHandler" => [
			"class" => "Bitsmist\\v1\Middlewares\Exception\BasicExceptionHandler",
		],

		"loggingExceptionHandler" => [
			"class" => "Bitsmist\\v1\Middlewares\Exception\LoggingExceptionHandler",
		],

		"echoExceptionHandler"	=> [
			"class" => "Bitsmist\\v1\Middlewares\Exception\EchoExceptionHandler",
		],
	],

	// -------------------------------------------------------------------------
	//	Emitters
	// -------------------------------------------------------------------------

	"emitters" => [
		"httpEmitter" => [
			"class" => "\Zend\HttpHandlerRunner\Emitter\SapiEmitter",
		],
	],

];
