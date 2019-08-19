<?php

namespace MichielKempen\LaravelGlide;

use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;
use League\Glide\Urls\UrlBuilderFactory;
use Symfony\Component\HttpFoundation\Response;

class Glide
{
    /**
     * @param string $filePath
     * @param array $manipulations
     * @return string
     */
    public static function getUrl(string $filePath, array $manipulations): string
    {
        $baseUrl = config('glide.glide_endpoint_prefix');
        $secret = config('glide.secret');

        $manipulator = UrlBuilderFactory::create($baseUrl, $secret);
        $url = $manipulator->getUrl($filePath, $manipulations);
        $url = url($url);

        return $url;
    }

    /**
     * @param string $filePath
     * @param array $parameters
     * @return Response
     */
    public static function getFile(string $filePath, array $parameters = []): Response
    {
        $baseUrl = config('glide.glide_endpoint_prefix');
        $secret = config('glide.secret');

        try {
            SignatureFactory::create($secret)->validateRequest($baseUrl.$filePath, $parameters);
        } catch (SignatureException $e) {
            return abort(404);
        }

        $glide = ServerFactory::create([
            'source' => Storage::disk(config('glide.source.filesystem'))->getDriver(),
            'source_path_prefix' => config('glide.source.path'),
            'cache' => Storage::disk(config('glide.cache.filesystem'))->getDriver(),
            'cache_path_prefix' => config('glide.cache.path'),
            'group_cache_in_folders' => true,
            'driver' => 'gd',
            'max_image_size' => 1024 * 1024 * 25,
            'base_url' => config('glide.file_endpoint_prefix'),
            'response' => app(LaravelResponseFactory::class),
        ]);

        $file = $glide->getImageResponse($filePath, $parameters);

        return $file;
    }
}