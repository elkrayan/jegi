<?php
if(isset($_POST['action'])){
    switch($_POST['action']){
        case 'site_add':
            include('action/site_add.php');
            break;
        case 'patient_add':
            include ('action/patient_add.php');
            break;
    }
}

if(isset($_GET['action'])){
    switch($_GET['action']){
        default:
        break;
    }
}
?>