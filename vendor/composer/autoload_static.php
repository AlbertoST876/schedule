<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc49f0599d62bf13e52e49f99d85a6221
{
    public static $files = array (
        '3301039177c1bc0836b9b927ac6a3e0e' => __DIR__ . '/../..' . '/src/functions/add.php',
        'b56da335f08d43514310f673a71c0853' => __DIR__ . '/../..' . '/src/functions/checks.php',
        '637edbff45f61162e65d7fbaeff966d3' => __DIR__ . '/../..' . '/src/functions/delete.php',
        'af568240ef83f488384f531cea786b8b' => __DIR__ . '/../..' . '/src/functions/events.php',
        'f011d602e75e7fd890005c81fa7f8572' => __DIR__ . '/../..' . '/src/functions/login.php',
        '8c7aed8d28da6ebe833e31bcef72b053' => __DIR__ . '/../..' . '/src/functions/register.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Schedule\\Classes\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Schedule\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/classes',
            1 => __DIR__ . '/../..' . '/src/classes',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc49f0599d62bf13e52e49f99d85a6221::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc49f0599d62bf13e52e49f99d85a6221::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc49f0599d62bf13e52e49f99d85a6221::$classMap;

        }, null, ClassLoader::class);
    }
}