<?php
    return [
        'key_auth' => base64_encode(env('XENDIT_SECRET_KEY') . ':'),
        'callback_token' => env( key: 'XENDIT_CALLBACK_TOKEN'),
];