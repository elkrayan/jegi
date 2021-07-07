<?php
try {
	$user = 'root';
	$pass = 'saluttwa19';
    $bdd = new PDO('mysql:host=192.236.160.119;dbname=jige', $user, $pass);
    
} catch (PDOException $e) {
    print "Connexion à la base de donnée échouée.  </br>Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>