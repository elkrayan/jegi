<?php

$req = $bdd->prepare("	SELECT  patient.nom AS nom, patient.prenom AS prenom, site.nom AS site, patient.lit AS lit, patient.poids AS poids_initial,patient.ddn AS ddn, 
                        parametre.systolique AS systolique, parametre.diastolique AS diastolique, parametre.temp AS temp, parametre.poids AS poids, 
                        parametre.saturation AS saturation, parametre.glycemie AS glycemie, parametre.frequence AS frequence, parametre.date AS lastvisite
                FROM patient
                JOIN parametre
                    ON parametre.patient_id = patient.id
                JOIN site
                    ON site.id = patient.site_id
                WHERE patient.id = :id
                ORDER BY parametre.id
                desc
                LIMIT 1");

$id = 2;
$req->execute(array(
	'id' => $id));
$patient = $req->fetch();
$dateNaissance = $patient['ddn'];
$aujourdhui = date("Y-m-d");
$age = date_diff(date_create($dateNaissance), date_create($aujourdhui));

$perte_poids=($patient['poids_initial']-$patient['poids'])/$patient['poids_initial'];
?>

<body id="patient">
    <header>
        <div class="container">
            <div class="row right">
                <h4>ULB</h4>
                <i class="fas fa-bed"></i>
                <h5>132</h5>
            </div>
            <div class="row start">
                <div class="col">
                    <h4><?php echo $patient['nom']. ''.$patient['prenom'];?></h4>
                    <h5><?php echo $age->format('%y');?>ans <span class="birthdate">(<?php echo $patient['ddn'];?>)</span></h5>
                </div>
            </div>
            <div class="row right">
                <h5><?php echo $patient['poids_initial']; ?> kg</h5>
                <h5 class="filled">-<?php echo $perte_poids;?>%</h5>
            </div>
        </div>
    </header>
    <main class="container">
        <!-- Derniere Visite du patient -->
        <article>
           <header>
               <h3>Dernière visite</h3>
               <h4><?php echo $patient['lastvisite']; ?></h4>
           </header>
           <div class="values">
               <!-- TA -->
               <div class="row">
                   <h4>Tension</h4>
                   <p><?php echo $patient['systolique'].'/'.$patient['diastolique'];?></p>
               </div>

               <!-- BPM -->
               <div class="row">
                   <h4>Fréquance</h4>
                   <p><?php echo $patient['frequence']; ?></p>
                </div>

                <!-- SAT -->
                <div class="row">
                    <h4>Saturation</h4>
                    <p><?php echo $patient['saturation']; ?>%</p>
                </div>

                <!-- glycémie -->
                <div class="row">
                    <h4>Glycémie</h4>
                    <p><?php echo $patient['glycemie']; ?></p>
                </div>

                <!-- Temp -->
                <div class="row">
                    <h4>Température</h4>
                    <p><?php echo $patient['temp']; ?>°C</p>
                </div>

                <!-- poids -->
                <div class="row">
                    <h4>Poids</h4>
                    <p><?php echo $patient['poids']; ?>kg</p>
                </div>
                <div class="col">
                    <h4>Commentaire</h4>
                    <p>
                        <?php echo $patient['commentaire']; ?>
                    </p>
                </div>
           </div>
        </article>
        <!-- ATCD -->
        <article>
            <header>
                <h3>Antécédents</h3>
            </header>
            <div class="values">
                <div class="row normal">
                    <h4 class="filled">Diabète</h4>
                    <h4 class="filled">Epileptique</h4>
                </div>
            </div>
        </article>
        <!-- Traitement -->
        <article>
            <header>
                <h3>Traitement</h3>
            </header>
            <div class="values">
                <div class="row normal">
                    <h4 class="filled">MEDIC 1</h4>
                    <h4 class="filled">MEDIC 2</h4>
                </div>
            </div>
        </article>
    </main>