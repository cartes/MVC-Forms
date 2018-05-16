<?php
namespace App\controllers;
defined("APPPATH") or die("Acceso Restringido");

use     \Core\view,
        \App\Models\user as Users,
        \Core\controller;

class Profile extends controller {
    
    public function index() {
        echo __CLASS__;
    }
    
    public function get($id) {
        echo $id;
    }
}
?>