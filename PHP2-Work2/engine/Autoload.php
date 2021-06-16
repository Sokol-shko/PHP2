<?php

namespace app\engine;

class Autoload
{
     function loadClass($className) {
        var_dump($className);
//        $replace  = [
//            'app\\',
//            '\\'
//        ];
//        $replaceOn = [
//            '../',
//            '/'
//        ];
//        $className = str_replace($replace, $replaceOn, $className);
        $className = str_replace("\\", "/", $className);
        $className = str_replace('app', '..', $className);
        $fileName = "{$className}.php";

        echo "а это не работает";

        var_dump($className);
        var_dump($fileName);

        if (file_exists($fileName)) {
            /** @noinspection PhpIncludeInspection */
            include $fileName;
        }
    }
}

