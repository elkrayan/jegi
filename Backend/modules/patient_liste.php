<body id="listPat">
    <header>
        <div class="container">
            <h3>Les patients</h3>
        </div>
    </header>
    <main>
<?php


$req = $bdd->prepare("SELECT * FROM patient WHERE site_id = :id");
$req->execute(array(
	'id' => $_GET['site_id'],));
;

while($patient = $req->fetch(PDO::FETCH_ASSOC)){

    $dateNaissance = $patient['ddn'];
    $aujourdhui = date("Y-m-d");
    $age = date_diff(date_create($dateNaissance), date_create($aujourdhui));

    echo'<a href="index.php?pages=21&patient_id='.$patient['id'].'" class="">
    <div class="content">
        <h3 class="title">'.$patient['nom'].' '.$patient['prenom'].'</h3>
        <h4>'.$age->format('%y').' ans<span> ('.$patient['ddn'].')</span></h4>
    </div>
    <footer>
        <h4 class="warning"><i class="fas fa-bed"></i> '.$patient['lit'].'</h4>';
    $risque = riskAssessment($patient['id']);
       if( $risque == true){ echo' <h4 class="danger"><i class="fas fa-exclamation-circle"></i></h4>';}
    echo '</footer>
</a>';
}
?>
       
    </main>