<?php

class Autoloader
{
    /**
     * Current Package Prefix to look for
     *  specifically
     *
     * @const string
     */
    const Prefix = 'ImgOptimize';

    /**
     * Register Autoload FN
     * @return void
     */
    public static function init()
    {
      spl_autoload_register('self::load');
    }

    /**
     * Actual Autoloader Fn
     *
     * @param  string $className Class being loaded
     * @return void
     */
    public static function load($className)
    {
      if(self::is_in_prefix($className)){
        $dir  = dirname(__DIR__);
        $path = str_replace('\\','/',$className);
        $path = $dir . '/' . $path . '.php';
        if(file_exists($path)){
          require_once($path);
        }
      }
    }

    /**
     * Check if Class being loaded is in Package
     *
     * @param  string   $className Class being loaded
     * @return boolean  whether or not to continue loading class
     */
    public static function is_in_prefix($className)
    {
      $len       = strlen(self::Prefix);
      $beginning = substr($className, 0, $len);
      return ($beginning === self::Prefix) ? true : false;
    }
}
