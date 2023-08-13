<?php
    return [
        'fda' => [
            'api_key' => env('FDA_API_KEY'),
        ],
        'usda' => [
            'api_key' => env('USDA_API_KEY', 'FDA_API_KEY'),
        ],
        'unsplash' => [
            'api_key' => env('UNSPLASH_API_KEY'),
            'api_secret' => env('UNSPLASH_API_SECRET'),
        ],
    ];
