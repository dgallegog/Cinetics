<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit54b1cf7ee9e0a320fb2c08a1c9c503cd
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit54b1cf7ee9e0a320fb2c08a1c9c503cd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit54b1cf7ee9e0a320fb2c08a1c9c503cd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit54b1cf7ee9e0a320fb2c08a1c9c503cd::$classMap;

        }, null, ClassLoader::class);
    }
}