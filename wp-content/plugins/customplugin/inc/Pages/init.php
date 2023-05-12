<?php
/**
 * @package customplugin
 */

namespace Inc;

class Init{
    public static function get_services(){
        return [
            Base\Enqueue::class
        ];
    }
    public static function register_services(){
        foreach(self::get_services() as $class){
            $add = self::instantiate($class);
            if (method_exists($add, 'register')){
                $add->register();
            }
        }
    }
    private static function instantiate($class){
        $add = new $class;
        return $add;
    }
}
