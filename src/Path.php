<?php

declare(strict_types=1);

namespace Fatrbaby\Termite;

class Path
{
    public static function join(string ...$paths): string
    {
        if (count($paths) === 0) {
            return '';
        }

        if (count($paths) === 1) {
            return $paths[0];
        }

        return implode(DIRECTORY_SEPARATOR, array_map(fn($path) => rtrim($path, '/'), $paths));
    }
}