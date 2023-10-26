<?php
    include_once("../useConnect.php");

    function Insert_contravention($no_dossier,$plaque,$couleur,$marque,$code_agent,$adresse,$article_violation,$montant_a_payer,$date_contravention)
    {
        $con = use_mysqli();
        $sql = " INSERT INTO `contravention`( `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`) 
        VALUES ('$no_dossier','$plaque','$couleur','$marque','$code_agent','$adresse','$article_violation','$montant_a_payer','$date_contravention')"; 


        $con->query($sql);
    }

    function Select_contravention(){
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE 1";
        $rs = $con->query($sql);
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        return $tab;
    }


    function Select_contravention_agent($code_agent){
        $con = use_mysqli();
        $sql = " SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE  `code_agent`='$code_agent'";
         $rs = $con->query($sql);
         $tab = $rs->fetch_all(MYSQLI_ASSOC);
         return $tab;
    }

    function Select_contravention_conducteur($no_dossier){
        $con = use_mysqli();
        $sql = " SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE  `no_dossier`='$no_dossier'";
         $rs = $con->query($sql);
         $tab = $rs->fetch_all(MYSQLI_ASSOC);
         return $tab;
    }
    function Select_contravention_journee($date_contravention){
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE DATE(`date_contravention`) = '$date_contravention'";
        $rs = $con->query($sql);
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        return $tab;
    }
    
    function Select_contravention_annee($annee_contravention,$no_dossier){
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE YEAR(`date_contravention`) = '$annee_contravention' AND `no_dossier` = '$no_dossier'";
        $rs = $con->query($sql);
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        return $tab;
    }
    
   
    function Select_contravention_no_fiche($no_fiche)
    {
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
        FROM `contravention` WHERE  `no_fiche` = '$no_fiche'";  
        $rs = $con->query($sql);
        $count = $rs->num_rows; 
        return $count;
    }



    function count_contraventions_by_dossier($no_fiche, $no_dossier)
    {
        $con = use_mysqli();
        $sql = "SELECT COUNT(*) as count_contraventions 
                FROM `contravention` 
                WHERE `no_fiche` = '$no_fiche' AND `no_dossier` = '$no_dossier'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
        $count = $row['count_contraventions'];
        return $count;
    }

    function Count_contra($no_dossier) {
        $conn = use_mysqli();
        $sql = "SELECT COUNT(*) AS Count FROM `contravention` WHERE `no_dossier` = '$no_dossier'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['Count'];
    }
    


    // function count_contraventions_by_dossier($no_fiche, $no_dossier)
    // {
    //     $con = use_mysqli();
    //     $sql = "SELECT `no_fiche`, `no_dossier`, `plaque_vehicule`, `couleur`, `marque`, `code_agent`, `adresse`, `article_violation`, `montant_a_payer`, `date_contravention`
    //     FROM `contravention` WHERE `no_fiche` = '$no_fiche' AND `no_dossier` = '$no_dossier'";  
    //     $result = $con->query($sql);
    //     $count = $result->num_rows; 
    //     return $count;
    // }
    
    


   
    //  Insert_contravention("1234","909878","bleu","Izuzu","1234","okap","bnbnnhnhnhnn","12221","00");

//    $t= Select_conducteur();
//     print_r($t);
//    print_r(Select_conducteur());
    // print_r(Select_contravention_annee(2023,1));


?>