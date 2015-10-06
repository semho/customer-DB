<?php
require __DIR__ . '/vendor/autoload.php';
spl_autoload_register(function ($class) {

    if (false !== strpos($class, '\\')) {
        $classNameParts = explode('\\', $class);
        if ('App' == $classNameParts[0]) {
            unset ($classNameParts[0]);
            $fileName = __DIR__ . '/' . implode('/', $classNameParts) . '.php';
            if (file_exists($fileName)) {
                require $fileName;
                return true;
            }
        }
    }
    return false;
});

