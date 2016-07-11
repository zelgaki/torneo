<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => '',
        'secret' => '',
    ],
    'facebook' => [
        'app_id'    => '412925352165546',
        'client_id' => '412925352165546',
        'client_secret' => 'b85e63993e422dc4157356244244883d',
        'redirect' => 'http://pokemon.zelgaki.com/ingresar/facebook',
    ],
    'twitter' => [
        'client_id' => 'jHfsbkoQ4b0pHoeBnz3Zsmruo',
        'client_secret' => 'b5PgRUUW1wqG8DJG5NdXsPzqYsa76HNMa2F7B2xrWRSSygTGI3',
        'redirect' => 'http://pokemon.zelgaki.com/ingresar/twitter',
    ],

];
