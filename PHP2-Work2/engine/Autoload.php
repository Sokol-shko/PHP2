<?php

namespace app\engine;

class Autoload
{
     function loadClass($className) {
        $className = str_replace(['app\\','\\'], ['../','/'], $className);
        $fileName = "{$className}.php";

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}

