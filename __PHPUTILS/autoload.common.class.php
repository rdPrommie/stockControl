<?php

class AutoLoadCommon {
    
    public static $autoload_tomb = array();
    
    public static function add($osztaly, $eleres) {
        self::$autoload_tomb[$osztaly] = $eleres;
    }
    
    public static function addTomb($tomb) {
        foreach($tomb as $osztaly => $eleres) {
            self::add($osztaly, $eleres);
        }
    }
    
    public static function get_autoload_tomb() {
        return self::$autoload_tomb;
    }
    
    public static function alapFajlokBetoltese() {
        self::addTomb(array(
           "XTemplate"          => PHPUTILS . "xtemplate.class.php",
           "_REQUESTHandler"    => PHPUTILS . "request.handler.class.php",
        ));
    }

}

if (!function_exists('common_config_autoload')) {
    function common_config_autoload($class_name){
		foreach (AutoloadCommon::get_autoload_tomb() as $osztaly => $eleres) {
			if($osztaly === $class_name){
				require_once($eleres);
			}
		}
    }
	spl_autoload_register('common_config_autoload');
}
