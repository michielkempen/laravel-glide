<?php

namespace MichielKempen\LaravelGlide;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GlideRequestHandler
{
    /**
     * @param Request $request
     * @param string $fileName
     * @return Response
     */
    public function __invoke(Request $request, string $fileName): Response
    {
        return Glide::getFile($fileName, $request->all());
    }
}