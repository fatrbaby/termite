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

    public static function abs(string $path): string
    {
        $absolute = realpath($path);

        return $absolute === false ? $path : $absolute;
    }

    public static function base(string $path): string
    {
        return basename($path);
    }

    public static function dir(string $path, int $levels = 1): string
    {
        return dirname($path, $levels);
    }

    public static function extension(string $path): string
    {
        return pathinfo($path, PATHINFO_EXTENSION);
    }

    public static function getUserDirectory(): string
    {
        if (false !== ($home = getenv('HOME'))) {
            return $home;
        }

        if (\defined('PHP_WINDOWS_VERSION_BUILD') && false !== ($home = getenv('USERPROFILE'))) {
            return $home;
        }

        if (\function_exists('posix_getuid') && \function_exists('posix_getpwuid')) {
            $info = posix_getpwuid(posix_getuid());

            return $info['dir'];
        }

        throw new \RuntimeException('Could not determine user directory');
    }
}
