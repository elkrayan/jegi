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

    case array(10,0):
    include('modules/site_liste.php');
    include('modules/site_add.php');
    break;

    default:
    include('modules/patient.php');
    break;

    

}

include('template/nav.php');
?>

<script type="text/javascript" src="public/js/app.js">