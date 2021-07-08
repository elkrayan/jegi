<?php
if($_SESSION['user']['role'] == 0 && isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['numero']) && isset($_POST['zip'])){
   
    $stmt = $bdd->prepare ("INSERT INTO site (nom, adresse, numero, zip) VALUES (:nom, :adresse, :numero, :zip)");
    $stmt -> bindParam(':nom', $_POST['nom']);
    $stmt -> bindParam(':adresse', $_POST['adresse']);
    $stmt -> bindParam(':numero', $_POST['numero']);
    $stmt -> bindParam(':zip', $_POST['zip']);
    $stmt -> execute();
}

?>