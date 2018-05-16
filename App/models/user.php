<?php
namespace App\models;
defined("APPPATH") or die("Acceso restringido");

use \Core\database;

class user {
    public static function getAllUsers(){
        try {
            $conn = database::instance();
            $sql = "SELECT * FROM res_cl_users";
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getUserByEmail($param) {
        try {
            $conn = database::instance();
            $sql = "SELECT * FROM res_cl_users WHERE email = '$param";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (\PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public static function getUserEmail($id) {
        try {
            $conn = database::instance();
            $sql = "SELECT email FROM res_cl_users WHERE id='$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            if(isset($result[0])) {
               $mail = $result[0]['email'];
            }
            return $mail;

        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public static function getUserId($user) {
        try {
            $conn = database::instance();
            $sql = "SELECT id FROM res_cl_users WHERE user = '$user'";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            return $result[0]['id'];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    
    public static function getUserName($id) {
        try {
            $conn = database::instance();
            $sql = "SELECT name FROM res_cl_users WHERE id='$id'";
            $query = $conn->prepare($sql);
            $query->execute();
            $result = $query->fetchAll();
            if(isset($result[0])) {
                $name = $result[0]['name'];
            }
            return $name;
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public static function login($user, $pass) {
        try {
            $conn = database::instance();
            $sql = "SELECT * FROM res_cl_users WHERE user = '$user' AND passw = '$pass'";
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>