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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    // this is for live credentials
    'facebook' => [
        'client_id' => '284627123247130',
        'client_secret' => 'a752bf3e619fce9af72bc53a21a57b97',
        'redirect' => 'https://tohfabd.com/auth/social/facebook/callback',
    ],


    'google' => [
        'client_id' => '982565878152-fl1ji9ligj5e3b7tsql65d6hs0kcpalt.apps.googleusercontent.com',
        'client_secret' => 'cX1I7wVWYRCLNGm-Rk42PjfQ',
        'redirect' => 'https://tohfabd.com/auth/social/google',
    ],


    // this is for staging credential
    // 'facebook' => [
    //     'client_id' => '4813695355355711',
    //     'client_secret' => '06e05697a902ee3e8702302a66234139',
    //     'redirect' => 'https://staging.tohfabd.com/auth/social/facebook/callback',
    // ],


    // 'google' => [
    //     'client_id' => '608871232059-0re8778e9gj3g8ou940t84e609n4qb12.apps.googleusercontent.com',
    //     'client_secret' => 'W6XHxPPVuWE_HGAlyn7E3ktX',
    //     'redirect' => 'https://staging.tohfabd.com/auth/social/google',
    // ],




];
