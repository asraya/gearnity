<?php
 
return [
    'mercant_id' => env('MIDTRANS_MERCHAT_ID'),
    'client_key' => env('MIDTRANS_CLIENT_KEY'),
    'server_key' => env('MIDTRANS_SERVER_KEY'),
 
    'is_production' => env('MIDTRANS_IS_PRODUCTION', true),
    'is_sanitized' => true,
    'is_3ds' => true,
];