<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',

            'dsn' => 'mysql:host=localhost;dbname=ku',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
			  
			
/* 		'enableSchemaCache' => true,

            // Duration of schema cache.
            'schemaCacheDuration' => 3600,

            // Name of the cache component used to store schema information
            'schemaCache' => 'cache',   */
        ], 
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
			'transport' => [
				 'class' => 'Swift_SmtpTransport',
				 'host' => 'scesm.org',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
				 'username' => 'admin@scesm.org',
				 'password' => 'Scesm@2017',
				 'port' => '25', // Port 25 is a very common port too
				 'encryption' => 'tls', // It is often used, check your provider or mail server specs
			],	
		
        ],
    ],
];
