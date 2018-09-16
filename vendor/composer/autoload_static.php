<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit41e27957f83da40f8ca8d83d8e47a00f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Core\\Classes\\' => 17,
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Core\\Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Core/Classes',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit41e27957f83da40f8ca8d83d8e47a00f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit41e27957f83da40f8ca8d83d8e47a00f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}