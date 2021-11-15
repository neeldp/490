<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54b17166d97f544ad8941eca86cb66b1
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SpotifyWebAPI\\' => 14,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SpotifyWebAPI\\' => 
        array (
            0 => __DIR__ . '/..' . '/jwilsson/spotify-web-api-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54b17166d97f544ad8941eca86cb66b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54b17166d97f544ad8941eca86cb66b1::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54b17166d97f544ad8941eca86cb66b1::$classMap;

        }, null, ClassLoader::class);
    }
}
