<?php

return [
	'connections' => [
		'mysql' => [
			'driver'    => 'mysql',
			'host'      => 'localhost',
			'database'  => getenv('DB_NAME'),
			'username'  => getenv('DB_USER'),
			'password'  => getenv('DB_PASSWORD'),
		],
	]
];
