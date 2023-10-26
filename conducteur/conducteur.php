<?php
    include_once("../useConnect.php");

    function Insert_conducteur($nom,$prenom,$sexe,$nif)
    {
        $con = use_mysqli();
        $sql = "INSERT INTO `conducteur`(`nom`, `prenom`, `sexe`, `nif`) 
        VALUES ('$nom','$prenom','$sexe','$nif') ";

        $con->query($sql);
    }

    function Select_conducteur(){
        $con = use_mysqli();
        $sql = "SELECT  `no_dossier`, `nom`, `prenom`, `sexe`, `nif` FROM `conducteur` WHERE 1";
        $rs = $con->query($sql);
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        return $tab;
    }

    function Select_conducteurNo($No_Dossier){
        $con = use_mysqli();
        $sql = "SELECT `no_dossier`, `nom`, `prenom`, `sexe`, `nif` FROM `conducteur` WHERE  `no_dossier`='$No_Dossier'";
         $rs = $con->query($sql);
         $tab = $rs->fetch_all(MYSQLI_ASSOC);
         return $tab;
    }

    function Select_conducteurNif($nif)
    {
        $con = use_mysqli();
        $sql = "SELECT `no_dossier`, `nom`, `prenom`, `sexe`, `nif` FROM `conducteur` WHERE `nif`='$nif'";
        $rs = $con->query($sql);
        $count = $rs->num_rows; 
        return $count;
    }

    function contravention_conducteurNo($No_Dossier){
        $con = use_mysqli();
        $sql = "SELECT `no_dossier`, `nom`, `prenom`, `sexe`, `nif` FROM `conducteur` WHERE  `no_dossier`='$No_Dossier'";
        $rs = $con->query($sql);
        $count = $rs->num_rows; 
        return $count;
    }
   

   


?>