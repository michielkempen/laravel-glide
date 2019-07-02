# Laravel Glide

Leverage Glide to perform on the fly image manipulations in Laravel.

## Installation

Add the package to the dependencies of your application.

```
composer require michielkempen/laravel-glide
```

## Configuration

Configure the package using environment variables.

```php
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
```

## Usage 

Here's a quick example that shows how an image can be modified:

```php
$manipulatedImageUrl = glide($fileName, ['w'=> 50, 'filt'=>'greyscale']);
```

Take a look at [Glide's image API](http://glide.thephpleague.com/1.0/api/quick-reference/) to see which parameters you can pass to the method.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
