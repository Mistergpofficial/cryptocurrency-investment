<?php

return [
	'host' 	 	=> env('DB_HOST','127.0.0.1'),
	'user' 		=> env('DB_USERNAME','root'),
	'password' 	=> env('DB_PASSWORD',''),
	'db' 		=> env('DB_DATABASE','crypt'),


	'private_keys' 	=> env('CRYPTOBOX_PRIVATEKEY',null),
	// 'private_keys' 	=> '';
];