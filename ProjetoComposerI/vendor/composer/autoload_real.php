<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit4f8f936e10acf72a0d57675a80ecc68d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit4f8f936e10acf72a0d57675a80ecc68d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit4f8f936e10acf72a0d57675a80ecc68d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit4f8f936e10acf72a0d57675a80ecc68d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
