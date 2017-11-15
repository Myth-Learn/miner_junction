<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => miner_junction\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1922292164474452',
        'client_secret' => '75354043e6fda7c432bd7ab1f585981c',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],


    'google' => [
        'client_id' => '563043871466-i3cjqd3reh92bglevqerrhdsc2icefna.apps.googleusercontent.com',
        'client_secret' => 'vQt0dhkjfpPQms-Yxs0zDGWY',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],

];
