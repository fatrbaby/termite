<?php

declare(strict_types=1);

namespace Fatrbaby\Termite;

it('join', function () {
    expect(Path::join('foo', 'bar'))->toBe('foo/bar')
        ->and(Path::join('foo', 'bar', 'baz'))->toBe('foo/bar/baz')
        ->and(Path::join('foo'))->toBe('foo')
        ->and(Path::join('/foo/'))->toBe('/foo')
        ->and(Path::join('foo/', 'bar/', 'baz/'))->toBe('foo/bar/baz')
        ->and(Path::join())->toBeEmpty();
});

it('abs', function () {
    expect(Path::abs('/usr/local/bin/../var'))->toBe('/usr/local/var')
        ->and(Path::abs('/a/../b'))->toBe('/a/../b')
        ->and(Path::abs(''))->toBe(Path::dir(__DIR__, 2));
});

it('base', function () {
    expect(Path::base('/foo/bar.txt'))->toBe('bar.txt')
        ->and(Path::base('/foo/bar'))->toBe('bar')
        ->and(Path::base('/foo/bar/baz/'))->toBe('baz')
        ->and(Path::base(''))->toBeEmpty();
});

it('dir', function () {
    expect(Path::dir('/foo/bar/a.txt'))->toBe('/foo/bar')
        ->and(Path::dir('/foo/bar/b'))->toBe('/foo/bar')
        ->and(Path::dir('/foo/bar/baz/', 2))->toBe('/foo')
        ->and(Path::dir('/foo/bar/baz/', 3))->toBe('/')
        ->and(Path::dir('/foo/bar/baz/', 4))->toBe('/')
        ->and(Path::dir(''))->toBeEmpty();
});

it('extension', function () {
    expect(Path::extension('/foo/bar.txt'))->toBe('txt')
        ->and(Path::extension(''))->toBeEmpty();
});

it('user home directory', function () {
    expect(Path::getUserDirectory())->toBe(getenv('HOME'));
});
