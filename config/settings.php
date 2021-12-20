<?php
return [
	// -------------------------------------------------------------------------
	//	PHP options
	// -------------------------------------------------------------------------

	"phpOptions" => [
		"display_errors" => "0",
		"display_startup_errors" => "0",
		"error_reporting" => E_ALL,
		"session.cookie_httponly" => true,
		"session.cookie_secure" => true,
	],

	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

    "options" => [
//        "showErrors" => true,
      	"showErrorsInHTML" => true,
		"rootDir" => __DIR__ . "/../",
		"sitesDir" => __DIR__ . "/../sites/",
    ],

	// -------------------------------------------------------------------------
	//	Request/Response
	// -------------------------------------------------------------------------

	// Request
	"request" => [
		"className" => "\Zend\Diactoros\ServerRequestFactory",
	],

	// Response
	"response" => [
		"className" => "\Zend\Diactoros\Response",
	],

	// -------------------------------------------------------------------------
	//	Router
	// -------------------------------------------------------------------------

	"router" => [
		"className" => "nikic\FastRoute",
		"routes" => [
			"default" => [
				"route" =>"/v{appVersion}/{resource}/{resource_id}",
				"handler" => "default",
			],
		],
	],

	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"services" => [
		"className" => "Bitsmist\\v1\Services\ServiceManager",
		"uses" => [
			"setupController",
			"mainController",
			"errorController",
			"emitter",
		]
	],

	"setupController" => [
		"className" => "Bitsmist\\v1\Services\MiddlewareService",
		"uses" => [
			"routeInitializer",
			"settingsInitializer",
			"phpInitializer",
		]
	],

	"mainController" => [
		"className" => "Bitsmist\\v1\Services\MiddlewareService",
		"uses" => [
			// Validate
			"headerValidator",
			"parameterValidator",
			// Session
			"startSessionHandler",
			// Authorize
			"sessionAuthorizer",
			// Connect
			"DBConnector",
			// Format
			"queryLimiter",
			"queryFormatter",
			// Handle
			"dbHandler",
			"customHandler",
			"dataFormatter",
			"paginationHandler",
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

	"errorController" => [
		"className" => "Bitsmist\\v1\Services\ErrorControllerService",
		"uses" => [
			"basicExceptionHandler",
			"loggingExceptionHandler",
			"statuscodeHandler",
			"resultHandler",
			"jsonRenderer",
			"extraHeaderBuilder",
			"originHeaderBuilder",
		],
	],

	"emitter" => [
		"className" => "Bitsmist\\v1\Services\PluginService",
		"uses" => [
			"httpEmitter"
		]
	],

	// -------------------------------------------------------------------------
	//	Middlewares
	// -------------------------------------------------------------------------

	"routeInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\RouteInitializer",
	],

	"settingsInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\SettingsInitializer",
		"settings" => [
			"{appRoot}/config/settings.php",
			"{sysRoot}/config/{method}.php",
			"{appRoot}/config/{method}.php",
			"{sysRoot}/config/{resource}.php",
			"{appRoot}/config/{resource}.php",
			"{sysRoot}/config/{method}_{resource}.php",
			"{appRoot}/config/{method}_{resource}.php",
		]
	],

	"phpInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\PHPInitializer"
	],

	// Session handler

	"startSessionHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\SessionHandler\StartSessionHandler",
	],

	"destroySessionHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\SessionHandler\DestroySessionHandler",
	],

	"regenerateSessionHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\Session\RegenerateSessionHandler",
	],

	// Authenticator

	"loginAuth" => [
		"className" => "Bitsmist\\v1\Middlewares\Authenticator\DBLoginAuthenticator",
	],

	// Connection

	"DBConnector" => [
		"className" => "Bitsmist\\v1\Middlewares\Connector\DBConnector",
	],

	"DBDisconnector" => [
		"className" => "Bitsmist\\v1\Middlewares\Connector\DBDisconnector",
	],

	// Authorizer

	"sessionAuthorizer" => [
		"className" => "Bitsmist\\v1\Middlewares\Authorizer\SessionAuthorizer",
	],

	// Validator

	"headerValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\HeaderValidator",
	],

	"parameterValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\ParameterValidator",
	],

	"queryValidator"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Validator\QueryValidator",
	],

	// Formatter

	"queryFormatter"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Formatter\QueryFormatter",
	],

	"dataFormatter"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Formatter\DataFormatter",
	],

	"queryLimiter"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Formatter\QueryLimiter",
	],

	// Renderer

	"jsonRenderer"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Renderer\JsonRenderer",
	],

	// Header builder

	"extraHeaderBuilder" => [
		"className" => "Bitsmist\\v1\Middlewares\HeaderBuilder\ExtraHeaderBuilder",
	],

	"originHeaderBuilder" => [
		"className" => "Bitsmist\\v1\Middlewares\HeaderBuilder\OriginHeaderBuilder",
	],

	// Handler

	"autoHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\AutoHandler",
	],

	"dbHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\DBHandler",
	],

	"modelHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\ModelHandler",
	],

	"customHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\CustomHandler",
		"uses" => [
			"{appRoot}/handlers/{method}_{resource}.php",
		]
	],

	"paginationHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\PaginationHandler",
	],

	"resultHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\ResultHandler",
	],

	"statuscodeHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\StatuscodeHandler",
	],

	// Exception handler

	"basicExceptionHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\ExceptionHandler\BasicExceptionHandler",
	],

	"loggingExceptionHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\ExceptionHandler\LoggingExceptionHandler",
	],

	"echoExceptionHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\ExceptionHandler\EchoExceptionHandler",
	],


	// -------------------------------------------------------------------------
	//	Plugins
	// -------------------------------------------------------------------------

	"httpEmitter" => [
		"className" => "Bitsmist\\v1\Plugins\Emitter\HttpEmitter",
	],

];
