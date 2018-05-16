<?php
namespace Core;
defined("APPPATH") or die("Acceso Restringido");

class Controller {
    public function __construct() {
        view::set("functions", true);
        view::render("functions");
    }
}
?>