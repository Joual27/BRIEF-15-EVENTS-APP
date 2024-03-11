<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'google' => [
        'client_id' => '71512154274-6rgak12tio1dcc79k2bdm1ghfgblg1mc.apps.googleusercontent.com',
        'client_secret' => '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' ,
        'redirect' => 'http://localhost/auth/google/user/data'
    ],

//    'facebook' => [
//        'client_id' => '810472304428325',
//        'client_secret' => '7b70fe03515664e5770e33d484f0be40',
//        'redirect' => 'https://e560-197-230-250-154.ngrok-free.app/auth/facebook/user/data'
//    ]

];
