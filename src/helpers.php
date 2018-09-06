<?php

use MichielKempen\LaravelGlide\Glide;

/**
 * @param string $fileName
 * @param array $manipulations
 * @return string
 */
function glide(string $fileName, array $manipulations): string
{
    return Glide::getUrl($fileName, $manipulations);
}