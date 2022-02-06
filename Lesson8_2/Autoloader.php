<?php

class Autoloader {

    /**
     * Register autoload function
     * 
     * @return void
     */
    public function registerAutoload(): void {

        spl_autoload_register([$this, 'autoLoadClass']);
    }

    /**
     * Require class by class name
     * 
     * @param string $className
     * 
     * @return bool
     */
    public function autoLoadClass(string $className): bool {

        $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        
        if (file_exists($file)) {
            require (__DIR__ . DIRECTORY_SEPARATOR . $file);

            return true;
        }
        
        return $file;

        //return false;
    }

}
