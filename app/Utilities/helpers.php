<?php

use Illuminate\Contracts\Auth\Authenticatable;

if (!function_exists('current_user')) {
    function current_user(): Authenticatable
    {
        return auth()->user();
    }
}

if (!function_exists('hashing_file')) {
    function hashing_file(string $filename): string
    {
        $pieces = explode(".", $filename);
        return md5($pieces[0]) . "." . $pieces[1];
    }
}
