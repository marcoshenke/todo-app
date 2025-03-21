<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET, POST, PUT, DELETE, OPTIONS'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['Origin, Content-Type, Accept, Authorization, X-Requested-With'],

    'exposed_headers' => [],

    'max_age' => 0,

    // 'allowed_origins' => ['http://localhost:5173', 'https://todo-app-marcos-es-henke.vercel.app', 'https://todo-app-frontend-afditznrm-marcoshenkes-projects.vercel.app'],
    'allowed_origins' => ['*'],

    'supports_credentials' => true,


];
