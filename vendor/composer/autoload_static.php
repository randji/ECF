<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit770a238a9889103a9f934dc38616df8a
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit770a238a9889103a9f934dc38616df8a::$classMap;

        }, null, ClassLoader::class);
    }
}
