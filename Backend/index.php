<?php
session_start();
require('config/sql.php');
require('config/class.php');
include('auth.php');
require('handler.php');
//Création de la variable si elle n'existes pas
if(!isset($_GET['pages'])){
    $_GET['pages'] ='';
}

//Header
include('template/head.php');
$arrayPerm = array($_GET['pages'], $_SESSION['user']['role']);

switch ($arrayPerm){
    
    case array(10,3):
    case array(10,0):
    include('modules/site_add.php');
    break;

    case array(20,0):
    case array(20,3):
    include('modules/patient_liste.php');

    default:
    include('modules/site_liste.php');
    break;

    

}

include('template/nav.php');
?>

<script type="text/javascript" src="public/js/app.js"></script>
</body>
</html>