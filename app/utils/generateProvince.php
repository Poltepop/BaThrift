<?php

function generateProvince(string $text, string $default = '-'): string
{
    if (preg_match('/\(([^)]+)\)/', $text, $matches)) {
        return trim($matches[1]);
    }

    return $default;
}