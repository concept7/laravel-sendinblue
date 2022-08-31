<?php

// config for LaravelSendinblue/Sendinblue
return [
    'key' => env('SENDINBLUE_API_KEY'),
    'sender_name' => env('APP_NAME'),
    'sender_email' => env('MAIL_FROM_ADDRESS'),
];
