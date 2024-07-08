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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'openworldmap' => [
        'key' => env('OPEN_WEATHER_MAP_API_KEY'),
        'url' => env('OPEN_WEATHER_MAP_API_URL'),
        'cache_lifespan' => env('OPEN_WEATHER_MAP_CACHE_LIFESPAN')
    ],

    'foursquare' => [
        'key' => env('FOURSQUARE_API_KEY'),
        'places_url' => env('FOURSQUARE_API_PLACES_URL'),
        'cache_lifespan' => env('FOURSQUARE_CACHE_LIFESPAN')
    ]
];
