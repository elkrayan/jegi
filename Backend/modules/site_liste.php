<body id="listSite">
    <main>
<?php
$req = $bdd->query("SELECT nom FROM site ");


while($site = $req->fetch(PDO::FETCH_ASSOC)){
    echo '<a href="">
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