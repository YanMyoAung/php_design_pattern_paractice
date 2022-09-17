<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitebf10a9e71798df30aac07b1e50983f4
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitebf10a9e71798df30aac07b1e50983f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitebf10a9e71798df30aac07b1e50983f4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitebf10a9e71798df30aac07b1e50983f4::$classMap;

        }, null, ClassLoader::class);
    }
}
