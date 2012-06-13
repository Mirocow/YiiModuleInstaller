<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
$mainConfig = include dirname(__FILE__).'/../../../protected/config/main.php';
return  array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',

	'sourceLanguage' => 'en',

	'language' => 'ru',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'defaultController'=>'site',

	'theme'=>'bootstrap',

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		/*'db'=>array(
			'connectionString' => 'sqlite:protected/data/blog.db',
			'tablePrefix' => 'tbl_',
		),*/
		// uncomment the following to use a MySQL database
		
		'db'=>$mainConfig['components']['db'],
		
		/*'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),*/
        'urlManager'=>array(
        	'urlFormat'=>'path',
        	'rules'=>array(
        		/*
        		'post/<id:\d+>/<title:.*?>'=>'post/view',
        		'posts/<tag:.*?>'=>'post/index',
        		*/
        		'install/build/<moduleName:\w+>'=>'install/build',
        		'install/uninstall/<moduleName:\w+>'=>'install/uninstall',
        		'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
        		
        	),
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>require(dirname(__FILE__).'/params.php'),
);
