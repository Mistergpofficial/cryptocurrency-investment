<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedHeaders' => ['Origin', 'X-Requested-With', 'Content-Type', 'Accept'],
   // 'allowedHeaders' => ['*'],
    //'allowedMethods' => ['*'],
    'allowedMethods' => ['POST', 'GET', 'OPTIONS', 'PUT', 'PATCH', 'DELETE', 'HEAD'],
    'exposedHeaders' => [],
    'maxAge' => 60 * 60 * 24,
    //'maxAge' => 0,

];
