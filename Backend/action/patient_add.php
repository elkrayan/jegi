<?php
if($_SESSION['user']['role'] == 0
    && isset($_POST['site_id'])
    && isset($_POST['lit'])
    && isset($_POST['last_name'])
    && isset($_POST['first_name'])
    && isset($_POST['sexe'])
    && isset($_POST['birth'])
    && isset($_POST['weight'])
) {

    //$site_id = $bdd->prepare("SELECT id FROM sites WHERE name = ");

    $stmt = $bdd->prepare("INSERT INTO patient (site_id, lit, nom, prenom, sexe, ddn, poids, critique, risque) VALUES (:site_id, :lit, :nom, :prenom, :sexe, :ddn, :poids, 0, 0");
    $stmt->bindParam(':site_id', $_POST['site_id']);
    $stmt->bindParam(':lit', $_POST['lit']);
    $stmt->bindParam(':nom', $_POST['last_name']);
    $stmt->bindParam(':prenom', $_POST['first_name']);
    $stmt->bindParam(":sexe", $_POST['sexe']);
    $stmt->bindParam(':ddn', $_POST['birth']);
    $stmt->bindParam(':poids', $_POST['weight']);
    $stmt->execute();
}
?>