<?php
    include_once("../useConnect.php");

    function Insert_dgi($no_fiche,$montant,$remarque,$date_p)
    {
        $con = use_mysqli();
        $sql = "INSERT INTO `dgi`( `no_fiche`,`montant`, `remarque`, `date_paiement`) 
        VALUES ($no_fiche,'$montant','$remarque','$date_p')";

        $con->query($sql);
    }

    function Select_dgi(){
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `montant`, `remarque`, `date_paiement` FROM `dgi` WHERE 1";
        $rs = $con->query($sql);
        $tab = $rs->fetch_all(MYSQLI_ASSOC);
        return $tab;
    }

    function Select_dgiNo($No_fiche){
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `montant`, `remarque`, `date_paiement` FROM `dgi`  WHERE  `no_fiche`='$No_fiche'";
         $rs = $con->query($sql);
         $tab = $rs->fetch_all(MYSQLI_ASSOC);
         return $tab;
    }
    function select_status_contravention($no_fiche)
    {
        $con = use_mysqli();
        $sql = "SELECT `no_fiche`, `montant`, `remarque`, `date_paiement`
                FROM `dgi`  WHERE  `no_fiche`='$no_fiche'";
        $result = $con->query($sql);
        $count = $result->num_rows;
    
        if ($count > 0) {
            return "pay";
        } else {
            return "n_pay";
        }
    }
    

   
?>