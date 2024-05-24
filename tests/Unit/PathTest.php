<?php

declare(strict_types=1);

namespace Fatrbaby\Termite;

test('join', function () {
    expect(Path::join('foo', 'bar'))->toBe('foo/bar')
        ->and(Path::join('foo', 'bar', 'baz'))->toBe('foo/bar/baz')
        ->and(Path::join('foo'))->toBe('foo')
        ->and(Path::join('foo/', 'bar/', 'baz/'))->toBe('foo/bar/baz')
        ->and(Path::join())->toBeEmpty();
});