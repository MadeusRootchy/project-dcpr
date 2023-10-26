<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCPR projet</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../header.css">

</head>
<body>
<?php
 include("../header.php");
 include_once("dgi.php");
 include_once("../contravention/contravention.php");
?>
 
            
<h2>PAYER CONTRAVENTION</h2>
<section>
<form method="post" action="#" >
    <div class="user-details">
        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder="No_fiche "  name="no_fiche" required>
        </div>
        <?php
        if (isset($_POST['btsave'])) {
        $no_fiche = $_POST['no_fiche'];
        
        $no_fiche_exist = Select_contravention_no_fiche($no_fiche);
        if ($no_fiche_exist < 1) { 
        echo "Aucun contravention ne correspond au no_fiche : $no_fiche ";
        echo" <a href='insertd.php'> cliquez pour Recoomencer</a>";

        exit; 
    }
        if($no_fiche_exist>1){
        
            exit; 
        }
}
    ?>

        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder="Montant"  name="montant" required>
        </div>

        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="date" placeholder=" date_de_paiement"  name="date" required>
        </div>
        <div class="input-box">
            <span class="details">
                Remarque
            </span>
            <textarea   cols="60" name="remarque">
            </textarea>
        </div>
        
        <div class="button">
        <input type="submit" value="Enregistrer"  name="btsave">
    </div>
</form>

<?php


if (isset($_POST['btsave'])) {
    $no_fiche= $_POST['no_fiche'];
    
    $no_fiche_exist = Select_contravention_no_fiche($no_fiche);
    if ($no_fiche_exist < 1) { 
        exit; 
    } elseif($no_fiche_exist === 1) {
            $montant = $_POST['montant'];
            $date = $_POST['date'];
            $remarque = $_POST['remarque'];

            Insert_dgi($no_fiche,$montant,$remarque,$date);
            echo" <a href='index_dgi.php'> cliquez pour Recoomencer</a>";

        exit; 
    }else{
        exit;
    }
}


    ?>
    
</body>
</html>