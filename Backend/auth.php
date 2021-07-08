<?php

if(isset($_POST['password']) || isset($_POST['login'])){
//Vérification de l'existence du couple login/mdp
$req = $bdd->prepare('SELECT * FROM user WHERE login = :login AND password = :password ');
$req->execute(array(
	'login' => $_POST['login'],
	'password' => md5($_POST['password'])));



//Si == 1 => Connexion
if($req->rowCount()==1){
    $user = $req->fetch();
	$_SESSION['user'] = array (
        'id' => $user['id'],
        'login' => $user['login'],
        'nom' => $user['nom'],
        'prenom' => $user['prenom'],
        'role' => $user['role'],
        'email' => $user['email']
);
}



$req->closeCursor();
}

elseif(!isset($_SESSION['user'])){
    include('template/head.php');
	include('template/login.php');
	exit();
}




?>