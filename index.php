<?php
if(!isset($_SESSION)) {
    session_start();
    ini_set("session.cookie_lifetime","1800");
    ini_set("session.gc_maxlifetime","1800");
    $session_hash = 'sha512';
    if(in_array($session_hash, hash_algos())) {
        ini_set('session.hash_function', $session_hash);
    }
}

error_reporting(E_ALL);
ini_set('display_errors', 1);

define("PROJECTPATH", __DIR__); // No funciono dirname() //directorio proyecto
define("APPPATH", PROJECTPATH . '/App'); // diredefine("PROJECTPATH", __DIR__); // No funciono dirname() //directorio proyectoctorio aplicación
define("CSSPATH", 'http://'.$_SERVER['HTTP_HOST'].'/residentia/App/views');

function autoload_classes($class_name)
{
    $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) .'.php';
        
    if(is_file($filename)) {
        include_once $filename;
    }
}

spl_autoload_register('autoload_classes');

$app = new \Core\app;
$app->render();
?>