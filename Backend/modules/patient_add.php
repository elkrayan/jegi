<?php
$query = $bdd->prepare("SELECT * FROM site");
$query->execute();

$sites = $query->fetchAll(\PDO::FETCH_ASSOC);
?>
<body id="addPat">
<header>
    <div class="container">
        <h2>Ajouter un patient</h2>
    </div>
</header>
<main>
    <div class="container">
        <!-- Create new patient -->
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="patient_add">
            <div class="row">
                <div class="form-item col">
                    <label for="site_id">Site</label>
                    <select name="site_id">
                        <option value="null" disabled selected>-- Selectionez un site --</option>
                        <?php
                        foreach ($sites as $site) {
                            echo '<option value="';
                            echo $site['id'] . '">';
                            echo $site['nom'];
                            echo '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-item col">
                    <label for="lit">lit</label>
                    <input type="text" name="lit" placeholder="Numéro de lit">
                </div>
            </div>
            <div class="row">
                <div class="form-item col">
                    <label for="last_name">Nom du patient</label>
                    <input type="text" name="last_name" id="" placeholder="Nom du patient" required>
                </div>
                <div class="form-item col">
                    <label for="first_name">Prénom du patient</label>
                    <input type="text" name="first_name" id="" placeholder="Prénom du patient">
                </div>
            </div>

            <div class="row">
                <div class="form-item col">
                    <label for="birth">Date de naissance</label>
                    <input type="date" name="birth" id="">
                </div>
                <div class="form-item col">
                    <label for="sexe">Sexe du patient</label>
                    <select name="sexe" id="">
                        <option value="X" selected disabled>Faite un choix</option>
                        <option value="H">Homme</option>
                        <option value="F">Femme</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="form-item col">
                    <label for="weight">Poids initial</label>
                    <input type="number" name="weight" placeholder="Poids initial">
                </div>
            </div>

            <div class="row">
                <button class="btn filled" type="submit">Inscrire le patient</button>
            </div>
        </form>
    </div>
</main>