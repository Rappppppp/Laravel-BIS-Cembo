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
        // Note that I can add env to these fields
        'client_id' => '228100020646-ro7j2ptqnk1vuk6h1q3s35rgi2pf5vkb.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
    ],

    'facebook' => [
        'app_id' => env('FACEBOOK_APP_ID', '257981910002516'),
        'app_secret' => env('FACEBOOK_APP_SECRET', '6b53d3a764a4e251cda5763af0a9e625'),
        'default_access_token' => env('FACEBOOK_DEFAULT_ACCESS_TOKEN', 'EAADqohgaq1QBAMZBF0hduv32ciBCQag8pPh4zjc72JJYB5weaZCnDaN5rNUEzVcinqyZBTfy9RKAvljlqKSPdDtBRwZA2KjQMpQBkew2g8DtwoIxZAdmik5mEHp9FZAF2dH1DjSwshw7E5CNgQ6VPuopS6dq2FQ5AJJVOEWeR4ZAZC5wFdWVm9saXarXCfkSW2xM5gZCeXcRZCxe11ZCGwWiGRUqStbPDMnFIUZD'),
    ],

];