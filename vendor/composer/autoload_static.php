<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6d0027eaf93ab9c5b079175a5258bf85
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Shopeo\\ShopeoElementorPluginScaffold\\' => 37,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Shopeo\\ShopeoElementorPluginScaffold\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6d0027eaf93ab9c5b079175a5258bf85::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6d0027eaf93ab9c5b079175a5258bf85::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6d0027eaf93ab9c5b079175a5258bf85::$classMap;

        }, null, ClassLoader::class);
    }
}
