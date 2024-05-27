# Termite
simple file & path toolkit

## install
```shell
composer required fatrbaby/termite
```

## usage
```php
use Fatrbaby\Termite\Path;

Path::join('/foo', 'bar');
Path::abs('/a/../b');
Path::base('/foo/bar/baz/');
Path::dir('/foo/bar/b');
Path::extension('/foo/bar.txt');
Path::getUserDirectory();
```