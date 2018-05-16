<?php 
namespace Core;
defined("APPPATH") or die("Acceso restringido");

class app {
	// Atributos
	
	private $_controller;
	private $_method = "index";
	private $_params = [];
	
	const NAMESPACE_CONTROLLERS = "\App\controllers\\";
	const CONTROLLERS_PATH = "App/controllers/";
	
	public $path = "/controllers/";
	
	// Metodos
	public function __construct() {
            $url = $this->parseUrl();
            if ($url[0] == '') { 
                $url[0]='home'; 
            }
            if (file_exists(self::CONTROLLERS_PATH.ucfirst($url[0] . ".php"))) {
                $this->_controller = ucfirst($url[0]);
                unset($url[0]);
            } else {
                echo self::CONTROLLERS_PATH.ucfirst($url[0] . ".php");
                include APPPATH . "/views/errors/404.php";
                exit;
            }

            $fullClass = self::NAMESPACE_CONTROLLERS.$this->_controller;

            $this->_controller = new $fullClass;

            if (isset($url[1])) {
                $this->_method = $url[1];

                if (method_exists($this->_controller, $url[1])) {
                        unset($url[1]);
                } else {
                        throw new \Exception("Error Procesando Método {$this->_method}", 1);
                }
            }

            $this->_params = $url ? array_values($url) : [];
		
	}
	
	public function parseUrl() {
            if (isset($_GET["url"])) {

                return explode("/", filter_var(rtrim($_GET["url"], "/")), FILTER_SANITIZE_URL);

            }		
	}
	
	public function render() {
	    call_user_func_array([$this->_controller, $this->_method], $this->_params);
	}
	
	public static function getConfig() {
            return parse_ini_file(APPPATH . "/config/config.ini");
	}
	
	public function getController() {
            return $this->_controller;
	}
	
	public function getMethod() {
            return $this->_method;
	}
	
	public function getParams() {
            return $this->_params;
	}
}
?>