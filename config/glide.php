<?php

return [

    'source' => [

        /*
         * The filesystem where the original files are stored.
         */
        'filesystem' => env('GLIDE_SOURCE_FILESYSTEM', 'public'),

        /*
         * The path within the filesystem where the original files are stored.
         */
        'path' => env('GLIDE_SOURCE_PATH', ''),

    ],

    'cache' => [

        /*
         * The filesystem where the manipulated files will be cached.
         */
        'filesystem' => env('GLIDE_CACHE_FILESYSTEM', 'public'),

        /*
         * The path within the filesystem where the manipulated files will be cached.
         */
        'path' => env('GLIDE_CACHE_PATH', 'cache/'),

    ],

    /*
     * The secret that is used to sign the manipulation requests.
     */
    'secret' => env('GLIDE_SECRET', 'secret'),

];