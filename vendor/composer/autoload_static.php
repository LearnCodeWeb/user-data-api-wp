<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite9684e336e528851f079a6fc56c7b7a4
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'A' => 
        array (
            'Acme' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'getUserData' => __DIR__ . '/../..' . '/api-data-functions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite9684e336e528851f079a6fc56c7b7a4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite9684e336e528851f079a6fc56c7b7a4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInite9684e336e528851f079a6fc56c7b7a4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInite9684e336e528851f079a6fc56c7b7a4::$classMap;

        }, null, ClassLoader::class);
    }
}
