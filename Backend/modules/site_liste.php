<body id="listSite">
    <main>
<?php
$patWarning = 0;
$patDanger = 0;

$req = $bdd->query("SELECT nom, id FROM site");
$dangerOuPas = $bdd->query("SELECT")


while($site = $req->fetch(PDO::FETCH_ASSOC)){
    echo '<a href="index.php?">
    <div class="content">
        <h3 class="title">'.$site['nom'].'</h3>
        <h4>63 personnes</h4>
    </div>
    <footer>
        <h4 class="warning"><i class="fas fa-exclamation-triangle"></i> 3</h4>
        <h4 class="danger"><i class="fas fa-exclamation-circle"></i> 1</h4>
    </footer>
</a>';
}

?>
        

    </main>