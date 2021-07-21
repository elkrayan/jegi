<?php
if($_SESSION['user']['role'] == 0 && isset($_POST['site-name']) && isset($_POST['site-adress']) && isset($_POST['site-adress-number']) && isset($_POST['site-zip'])){
   
    $stmt = $bdd->prepare ("INSERT INTO site (nom, adresse, numero, zip) VALUES (:nom, :adresse, :numero, :zip)");
    $stmt -> bindParam(':nom', $_POST['site-name']);
    $stmt -> bindParam(':adresse', $_POST['site-adress']);
    $stmt -> bindParam(':numero', $_POST['site-adress-number']);
    $stmt -> bindParam(':zip', $_POST['site-zip']);
    $stmt -> execute();
}

?>