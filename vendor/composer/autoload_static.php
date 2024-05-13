<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit14186aa56de677bd1ad6c8a9662d66b6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/clases',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit14186aa56de677bd1ad6c8a9662d66b6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit14186aa56de677bd1ad6c8a9662d66b6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit14186aa56de677bd1ad6c8a9662d66b6::$classMap;

        }, null, ClassLoader::class);
    }
}