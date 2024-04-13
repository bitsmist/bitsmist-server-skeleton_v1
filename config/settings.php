<?php
return [
	// -------------------------------------------------------------------------
	//	PHP options
	// -------------------------------------------------------------------------

	"phpOptions" => [
		"display_errors" => "0",
		"display_startup_errors" => "0",
		"session.cookie_httponly" => true,
		"session.cookie_secure" => true,
	],

	// -------------------------------------------------------------------------
	//	Options
	// -------------------------------------------------------------------------

    "options" => [
		"showErrors" => false,
		"showErrorsInHtml" => false,
		"sysRoot" => __DIR__ . "/../",
		"appRoot" => "{sysRoot}/sites/v{appVer}/{appName}",
    ],

	// -------------------------------------------------------------------------
	//	Request/Response
	// -------------------------------------------------------------------------

	// Request
	"request" => [
		"className" => "\Laminas\Diactoros\ServerRequestFactory",
	],

	// Response
	"response" => [
		"className" => "\Laminas\Diactoros\Response",
	],

	// -------------------------------------------------------------------------
	//	Router
	// -------------------------------------------------------------------------

	"router" => [
		"className" => "nikic\FastRoute",
		"routes" => [
			"default" => [
				"route" =>"/v{appVer}/{resource}/{resource_id}",
				"handler" => "default",
			],
		],
	],

	// -------------------------------------------------------------------------
	//	Controllers
	// -------------------------------------------------------------------------

	"controllers" => [
		"className" => "Bitsmist\\v1\Services\PluginService",
		"uses" => [
			"setupController",
			"mainController",
			"errorController",
			"emitterController",
		]
	],

	"setupController" => [
		"className" => "Bitsmist\\v1\Services\MiddlewareService",
		"uses" => [
			"sysInfoInitializer",
			"routeInitializer",
			"appInfoInitializer",
			"settingsInitializer",
			"phpInitializer",
		]
	],

	"mainController" => [
		"className" => "Bitsmist\\v1\Services\MiddlewareService",
		"uses" => [
			// Validate
			"hostHeaderValidator",
			"originHeaderValidator",
			"requiredHeaderValidator",
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
			"customMiddlewareHandler",
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

	"emitterController" => [
		"className" => "Bitsmist\\v1\Plugins\Emitter\HttpEmitter",
	],

	// -------------------------------------------------------------------------
	//	Services
	// -------------------------------------------------------------------------

	"services" => [
		"className" => "Bitsmist\\v1\Services\PluginService",
		"uses" => [
			"logger",
			"db",
		]
	],

	"logger" => [
		"className" => "Bitsmist\\v1\Services\PluginService",
		"uses" => [
			"warningLogger"
		]
	],

	"db" => [
		"className" => "Bitsmist\\v1\Services\PluginService",
		"uses" => [
		]
	],

	// -------------------------------------------------------------------------
	//	Plugins
	// -------------------------------------------------------------------------

	"debugLogger" => [
		"className" => "Bitsmist\\v1\Plugins\Logger\FileLogger",
		"level" => "debug",
		"baseDir" => __DIR__ . "/../log/",
		"fileName" => "bitsmist_debug.log",
	],

	"warningLogger" => [
		"className" => "Bitsmist\\v1\Plugins\Logger\FileLogger",
		"level" => "warning",
		"baseDir" => __DIR__ . "/../log/",
		"fileName" => "bitsmist_warning.log",
	],

	// -------------------------------------------------------------------------
	//	Middlewares
	// -------------------------------------------------------------------------

	// Initializer

	"routeInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\RouteInitializer",
	],

	"sysInfoInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\SysInfoInitializer",
	],

	"appInfoInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\AppInfoInitializer",
	],

	"settingsInitializer" => [
		"className" => "Bitsmist\\v1\Middlewares\Initializer\SettingsInitializer",
		"uses" => [
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

	"hostHeaderValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\HostHeaderValidator",
	],

	"originHeaderValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\OriginHeaderValidator",
	],

	"requiredHeaderValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\RequiredHeaderValidator",
	],

	"parameterValidator" => [
		"className" => "Bitsmist\\v1\Middlewares\Validator\ParameterValidator",
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

	"dbHandler"	=> [
		"className" => "Bitsmist\\v1\Middlewares\Handler\DBHandler",
	],

	"customMiddlewareHandler" => [
		"className" => "Bitsmist\\v1\Middlewares\Handler\CustomMiddlewareHandler",
		"uses" => [
			"{appRoot}/handlers/{method}.php",
			"{appRoot}/handlers/{resource}.php",
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
];
