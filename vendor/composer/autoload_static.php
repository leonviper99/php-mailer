<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf348252d09f92865574f9cbc5a06b32a
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf348252d09f92865574f9cbc5a06b32a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf348252d09f92865574f9cbc5a06b32a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf348252d09f92865574f9cbc5a06b32a::$classMap;

        }, null, ClassLoader::class);
    }
}
