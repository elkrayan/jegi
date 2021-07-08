<?php
try {
	$user = 'root';
	$pass = '';
    $bdd = new PDO('mysql:host=localhost;dbname=jige', $user, $pass);
    
} catch (PDOException $e) {
    print "Connexion à la base de donnée échouée.  </br>Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>