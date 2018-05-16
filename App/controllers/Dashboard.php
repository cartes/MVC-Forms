<?php
namespace App\controllers;
defined("APPPATH") or die('Acceso restringido');

use	\Core\view,
        \Core\phpformbuilder,
        \App\models\user as Users,
	\Core\controller;

/**
 * Description of Dashboard
 *
 * @author cartes
 */

class Dashboard extends controller {
    
    public function __construct() {
        view::set("functions", true);
        view::render("functions");
        
        if (!isset($_SESSION['id_user'])) {
            $url = get_site_path() . '/';
            header("Location: $url");
        }

        $id = $_SESSION['id_user'];
        $name = Users::getUserName($id);
        view::set('name', $name);
        
    }
    
    public function index() {
        view::set("title", "Bienvenido a su escritorio");
        view::render('dashboard');
    }
    
    public function logout() {
        session_destroy();
        unset($_SESSION);
        $url = get_site_path() . '/';
        header("Location: $url");
    }
}