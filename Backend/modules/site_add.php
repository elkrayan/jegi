<body id="addSite">
<header>
    <div class="container">
        <h2>Ajouter un site</h2>
    </div>
</header>
<main>
    <div class="container">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="site_add">
            <div class="form-item col">
                <label for="">Nom du site</label>
                <input type="text" name="site-name" id="" placeholder="Nom du site">
            </div>
            <div class="form-item col">
                <label for="">Adresse du site</label>
                <input type="text" name="site-adress" id="" placeholder="Adresse du site">
            </div>
            <div class="row">
                <div class="form-item col">
                    <label for="">Numéro</label>
                    <input type="number" name="site-adress-number" id="" placeholder="Numéro">
                </div>
                <div class="form-item col">
                    <label for="">Code postal</label>
                    <input type="number" name="site-zip" id="" placeholder="code postal">
                </div>
            </div>

            <button class="btn filled" type="submit">Envoyer<i class="fas fa-send"></i></button>
        </form>
    </div>
</main>