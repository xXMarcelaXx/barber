<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite2587c5f09dafb7fa85a6ec94effcb9f
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

        spl_autoload_register(array('ComposerAutoloaderInite2587c5f09dafb7fa85a6ec94effcb9f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite2587c5f09dafb7fa85a6ec94effcb9f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite2587c5f09dafb7fa85a6ec94effcb9f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
