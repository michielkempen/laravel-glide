<?php

namespace MichielKempen\LaravelGlide;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlideRequestHandler
{
    /**
     * @param Request $request
     * @param string $filePath
     * @return Response
     */
    public function __invoke(Request $request, string $filePath): Response
    {
        return Glide::getFile($filePath, $request->all());
    }
}