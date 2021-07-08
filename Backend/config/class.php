<?php

function riskAssessment($patient_id){
    require ('sql.php');
    $req = $bdd->prepare("	SELECT  patient.risque AS risque, patient.nom AS nom, patient.prenom AS prenom, site.nom AS site, patient.lit AS lit, patient.poids AS poids_initial,patient.ddn AS ddn, 
                        parametre.systolique AS systolique, parametre.diastolique AS diastolique, parametre.temp AS temp, parametre.poids AS poids, 
                        parametre.saturation AS saturation, parametre.glycemie AS glycemie, parametre.frequence AS frequence, parametre.date AS lastvisite,parametre.com AS commentaire
                FROM patient
                JOIN parametre
                    ON parametre.patient_id = patient.id
                JOIN site
                    ON site.id = patient.site_id
                WHERE patient.id = :id
                ORDER BY parametre.id
                desc
                LIMIT 1");
    $id = $patient_id;
    $req->execute(array(
        'id' => $id));
    $patient = $req->fetch();

    //CRITERE PERTE DE POIDS >10%
    $perte_poids=($patient['poids_initial']-$patient['poids'])/$patient['poids_initial'];
    
    //CRITERE ANTECEDANT
    $critique = 1;
    $reqAntecedant = $bdd->prepare('SELECT * FROM antecedent WHERE patient_id = :id AND pertinent = :critique ');
    $reqAntecedant->execute(array(
    'id' => $patient_id,
    'critique' => $critique));
       
    //Criètre parametre
    if ($patient['risque'] == 1){
        return true;
    }
    elseif($perte_poids >0.1){
        return true;
    }
    elseif($reqAntecedant->rowCount()>0){
        return true;
    }
    elseif($patient['systolique']<90 || $patient['frequence']<55 || $patient['glycemie']<50 || $patient['temp']<35){
        return true;
    }
    else{
        return false;
    }
        
}
?>