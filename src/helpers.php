<?php

use MichielKempen\LaravelGlide\Glide;

/**
 * @param string $filePath
 * @param array $manipulations
 * @return string
 */
function glide(string $filePath, array $manipulations): string
{
    return Glide::getUrl($filePath, $manipulations);
}