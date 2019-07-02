<?php

use Illuminate\Support\Facades\Route;
use MichielKempen\LaravelGlide\GlideRequestHandler;

Route::get('glide/{file_name}', GlideRequestHandler::class)->where('file_name', '.*');