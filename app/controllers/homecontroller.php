<?php
namespace App\Controllers;

class HomeController {

    function __constructor() {
        
    }

    public function index() {
        require_once("../views/home/index.php");
    }
}
?>