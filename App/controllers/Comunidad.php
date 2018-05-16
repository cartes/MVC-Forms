<?php
namespace App\controllers;
defined("APPPATH") or die('Acceso Restringido');

use     \Core\view,
        \App\models\user as Users,
        \App\models\admin as Admin,
        \Core\controller;

class Comunidad extends controller {
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
    
    public function asignaciones($param = NULL) {
        view::set("titulo", "Asignaciones de copropiedades");
        view::render('asignaciones');
    }
    
    public function unidad( $param=NULL, $id=NULL ) {
        $unidades = Admin::getAllUnits();
        
        if(count($unidades)==0) {
            $unidades = "No hay unidades creadas";
        }
        
        if ($param==NULL) {
            view::set("titulo", "Unidades de copropiedad");
            view::set('unidades', $unidades);
            view::render('unidad');
        } elseif ($param=='borrar') {
            Admin::deleteUnit($id);
        } elseif ($param=='editar') {
            if ($id==NULL) {
                view::set("title", "Unidades de copropiedad");
                view::set('unidades', $unidades);
                view::render('unidad');
            } else {
                $unidad = Admin::getUnit($id);
                view::set("title", 'Editando unidad: ' . $unidad[0]['unidad']);
                view::set("unidad", $unidad);
                view::set("form", 'forms/editar-unidad');
                view::render('unidad');
            }
        }
    }
    
    public function crearnuevaunidad() {
        view::render('forms/form-nueva-unidad');
    }
    
    public function saveunit() {
        if ($_POST['submit']=='enviar') {
            Admin::saveUnit($_POST);
        }
    }
    
    public function editunit( $id=NULL ) {
        if ($_POST['submit']=='enviar' && $id != NULL) {
            $data = $_POST;
            Admin::editUnit($id, $data);
        }
    }

}
?>