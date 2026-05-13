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
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'power_falcon' => [
        'phone' => env('POWER_FALCON_PHONE', '+20 100 000 0000'),
        'phone_alt' => env('POWER_FALCON_PHONE_ALT', '+20 120 000 0000'),
        'whatsapp' => env('POWER_FALCON_WHATSAPP', '201000000000'),
        'address' => env('POWER_FALCON_ADDRESS', '4 Dr Mohammed Fouad Shokry, Bein Al Ganayen, El Weili, Cairo Governorate 4390202'),
        'maps_url' => env('POWER_FALCON_MAPS_URL', 'https://maps.app.goo.gl/uVN5GAhvomTNJrzk8?g_st=awb'),
        'maps_embed_url' => env('POWER_FALCON_MAPS_EMBED_URL', 'https://maps.google.com/maps?q=4%20Dr%20Mohammed%20Fouad%20Shokry%2C%20Bein%20Al%20Ganayen%2C%20El%20Weili%2C%20Cairo%20Governorate%204390202&z=16&output=embed'),
    ],

];
