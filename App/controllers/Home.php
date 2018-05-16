<?php 
namespace App\controllers;
defined("APPPATH") or die("Acceso restringido");

use	\Core\view,
        \App\models\user as Users,
	\Core\controller;
	
class Home extends controller {
	
	public function index() {
            view::set('user', 'Bienvenido a Residentia');
            view::set('title', 'Administrador Residentia');
            if (!isset($_SESSION['id_user'])) {
                view::render('home');
            } else {
                $url = get_site_path() . '/dashboard';
                header("Location: $url");
            }
	}
        
        public function users() {
            $users = Users::getAllUsers();
            view::set("users", $users);
            view::set("title", "Usuarios");
            view::render("admin");
        }
        
        public function login() {
            $user = $_POST['userName'];
            $pass = md5($_POST['password']);
            
            $login = Users::login($user, $pass);
            if (count($login)==0) {
                view::set('user', 'Usuario o Contraseña no existen');
                view::set('title', 'Ingrese un usuario o contraseña valido');
                view::set('error', 'Ingrese un usuario o contraseña valido');
                view::render("home");
            } else {
                $id = Users::getUserId($_POST['userName']);
                $_SESSION['id_user']=$id;
                $url = get_site_path() . '/dashboard';
                header("Location: $url");
            }
        }
}
?>