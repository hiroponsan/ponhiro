<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f685c10e6f9ed71ffc8172aff89894a
{
    public static $prefixesPsr0 = array (
        'R' => 
        array (
            'RakutenRws_' => 
            array (
                0 => __DIR__ . '/..' . '/rakuten-ws/rws-php-sdk/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit1f685c10e6f9ed71ffc8172aff89894a::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
