<?php
namespace App\models;
defined("APPPATH") or die("Acceso Restringido");

use \Core\database,
    \Core\view,
    \App\models\user as Users;

class admin {
    
    public static function deleteUnit($id) {
        try {
            $conn = database::instance();
            $sql = "DELETE FROM res_cl_unidades WHERE id_unidad = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getUnit($id) {
        try {
            $conn = database::instance();
            $sql = "SELECT * FROM res_cl_unidades WHERE id_unidad = '$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getAllUnits() {
        try {
            $conn = database::instance();
            $sql = "SELECT * FROM res_cl_unidades";
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public static function editUnit($id, $array) {
        $unidad = self::getUnit($id);
        $num_unidad = $array['unidad'];
        $rateo = $array['rateo'];
        $tipoUnidad = $array['tipoUnidad'];
        $nombreCopropietario = $array['nombreCopropietario'];
        $emailCopropietario = $array['emailCopropietario'];
        
        if(isset($array['nombreResidente'])) {
            $nombreResidente = $array['nombreResidente'];
        }
        if (isset($array['emailResidente'])) {
            $emailResidente = $array['emailResidente'];
        }
        $sql_unidad = "UPDATE `res_cl_unidades` SET `unidad` = '$num_unidad', `rateo` = '$rateo', `tipo` = '$tipoUnidad' WHERE id_unidad='$id'";

        try {
            $conn = database::instance();
            $query = $conn->prepare($sql_unidad);
            $query->execute();
        } catch (\PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
        if (isset($array['same']) && $array['same']=='on') {
            $id_copro = $unidad[0]['id_copro'];
            $sql_user = "UPDATE `res_cl_users` SET `name` = '$nombreCopropietario', `email` = '$emailCopropietario' WHERE id = '$id_copro'";
            
            try {
                $conn = database::instance();
                $query = $conn->prepare($sql_user);
                $query->execute();
            } catch (\PDOException $ex) {
                echo 'Error: ' . $ex->getMessage();
            }
        } else {
            $id_copro = $unidad[0]['id_copro'];
            $id_residente = $unidad[0]['id_resident'];
            $sql_user = "UPDATE `res_cl_users` SET `name` = '$nombreResidente', `email` = '$emailResidente' WHERE id = '$id_residente'";
            
            try {
                $conn = database::instance();
                $query = $conn->prepare($sql_user);
                $query->execute();
            } catch (\PDOException $ex) {
                echo 'Error: ' . $ex->getMessage();
            }
        }
        $newURL = 'http://www.cristiancartes.cl/residentia/comunidad/unidad';
        header('Location: '.$newURL);
//        $unidades = self::getAllUnits();
//        view::set("title", "Unidades de copropiedad");
//        view::set('unidades', $unidades);
//        view::render('unidad');

    }

    public static function saveUnit($array) {
        $unidad = $array['unidad'];
        $rateo = $array['rateo'];
        $tipoUnidad = $array['tipoUnidad'];
        $nombreCopropietario = $array['nombreCopropietario'];
        $emailCopropietario = $array['emailCopropietario'];
        $arrayusername = explode(" ", $nombreCopropietario);
        if(!isset($arrayusername[1])) {
            $arrayusername[1] = ' ';
        }
        $username = strtolower( substr($arrayusername[0], 0, 1) . $arrayusername[1] );
        $passw = md5($username);
        
        $sql1 = "INSERT INTO `res_cl_users` (`user`, `passw`, `name`, `email`, `id_role`) VALUES ('$username', '$passw', '$nombreCopropietario', '$emailCopropietario', '2');";
        
        try {
            $conn = database::instance();
            $query = $conn->prepare($sql1);
            $query->execute();
            $lastId = $conn->lastId();
            
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        $idCopropietario = $lastId;

        if(isset($array['same']) && $array['same']== 'on') {
            $idResidente = $lastId;
        } else {
            if (isset($array['nombreResidente'])) {
                $nombreResidente = $array['nombreResidente'];
            }
            if (isset($array['emailResidente'])) {
                $emailResidente = $array['emailResidente'];
            }
            $arrayusername = explode(" ", $nombreResidente);
            $username = strtolower( substr($arrayusername[0], 0, 1) . $arrayusername[1] );
            $passw = md5($username);
            $sql2 = "INSERT INTO `res_cl_users` (`user`, `passw`, `name`, `email`, `id_role`) VALUES ('$username', '$passw', '$nombreResidente', '$emailResidente', '2');";

            try {
                $conn = database::instance();
                $query = $conn->prepare($sql2);
                $query->execute();
                $lastId = $conn->lastId();
                $idResidente = $lastId;
            } catch (\PDOException $e) {
                "Error: " . $e->getMessage();
            }
        }
        $sqlUnidad = "INSERT INTO res_cl_unidades (`id_copro`, `id_resident`, `unidad`, `tipo`, `rateo`) VALUES ('$idCopropietario', '$idResidente', '$unidad', '$tipoUnidad', '$rateo')";
        
        try {
            $conn = database::instance();
            $query = $conn->prepare($sqlUnidad);
            $query->execute();
            
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
        $unidades = self::getAllUnits();
        view::set("title", "Unidades de copropiedad");
        view::set('unidades', $unidades);
        view::render('unidad');
    } // Fin saveUnit
    
}
