<?php 
namespace Core;
defined("APPPATH") or die("Acceso restringido");

class view {

    // Atributos
    protected static $data;
    const VIEW_PATH = "App/views/";
    const EXTENSION_TEMPLATES = "php";
	
    //Metodos
    public static function render($template) {
        if ( !file_exists(self::VIEW_PATH . $template . '.' . self::EXTENSION_TEMPLATES) ) {

            throw new \Exception("Error: El archivo" . self::VIEW_PATH . $template . '.' . self::EXTENSION_TEMPLATES . " no existe");

        }

        ob_start();
        extract(self::$data);
        include(self::VIEW_PATH . $template . '.' . self::EXTENSION_TEMPLATES);
        $str = ob_get_contents();
        ob_end_clean();

        echo $str;

    }

    public static function set($name, $value) {
            self::$data[$name] = $value;
    }
}
?>