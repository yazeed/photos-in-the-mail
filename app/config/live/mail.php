<?php

return [
	

	'host' => 'smtp.mandrillapp.com',

	'username' => getenv('MAIL_USERNAME'),

	'password' => getenv('MAIL_PASSWORD'),

    'from' => array('address' => getenv('MAIL_FROM_ADDRESS'), 'name' => getenv('MAIL_FROM_NAME')),


];