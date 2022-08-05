<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f5387148c5ff97eda681a5db8731f18
{
    public static $files = array (
        '08fd240acb11afef84204e88f0000e53' => __DIR__ . '/../..' . '/config/ConfigTemplate.php',
    );

    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f5387148c5ff97eda681a5db8731f18::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f5387148c5ff97eda681a5db8731f18::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4f5387148c5ff97eda681a5db8731f18::$classMap;

        }, null, ClassLoader::class);
    }
}
