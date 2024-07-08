<?php

use Illuminate\Support\Str;

function cacheKeyGenerator($prefix, ...$args)
{
    return $prefix . '-' . Str::toBase64(implode('', $args));
}