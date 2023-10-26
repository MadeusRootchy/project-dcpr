<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../header.css">


</head>
<body> 
    <?php
 include("../header.php");
 include_once("contravention.php");
 include_once("../conducteur/conducteur.php");
 include_once("../dcpr/fDCPR.php");



?>

<h2>ENREGISTREMENT CONTREVENTION</h2>
<section>
<form method="post" action="#" >
    <div class="user-details">
           
        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder=" No_dossier conducteur" name="no_dossier" required>
        </div>
       
<?php
    if (isset($_POST['btsave'])) {
    $no_dossier = $_POST['no_dossier'];
    
    $no_dossier_exist = contravention_conducteurNo($no_dossier);
    if ($no_dossier_exist < 1) { 
        echo "<h4>aucun conducteur ne correspond au no_dossier: $no_dossier .</h4>
        <a href='../conducteur/conduc.php'>enregistrement conducteur</a>||
        <a href='save_contravention.php'>Re-enregistrer</a>";

        exit; 
    }
}
    ?>

        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder= "Plaque" name="plaque" required>
        </div>

        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder="Couleur" name="couleur" required>
        </div>

        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder="Marque" name="marque" required>
        </div>
        <div class="input-box">

        <?php
       
        if (isset($_POST['btsave'])) {

            $code_agent = $_POST['code_agent'];
            $agent = contravention_agent($code_agent);
            if (!$agent) {

                echo "<h4>Code agent incorrect.</h4>";
                echo("<a href='save_contravention.php'>Re-enregistrer</a>");
   

                exit;
                }
            }
        ?>
            <span class="details">
                
            </span>
            <input type="text" placeholder=" Code Agent"name=" code_agent" required>
        </div>
         <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder="Adresse" name="adresse" required>
        </div> 
        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder="Article_Violation" name="article_violation" required>
        </div> 
        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder="Montant(HTG)" name="montant" required>
        </div>
        <div class="input-box">
            <span class="details">
            Date Contravention
            </span>
            <input type="date" placeholder="date Contravention" name="date" required>
        </div>
        
    </div>

    <div class="button">
        <input type="submit" name="btsave" value="Enregistrer" >
    </div>

</form>
</section>

<?php
if (isset($_POST['btsave'])) {
    $no_dossier = $_POST['no_dossier'];
    $code_agent = $_POST['code_agent'];
    $agent = contravention_agent($code_agent);

    $no_dossier_exist = contravention_conducteurNo($no_dossier);
    if ($no_dossier_exist > 0 && $agent) { 

        $no_dossier =  $_POST['no_dossier'];
        $plaque = $_POST['plaque'];
        $couleur = $_POST['couleur'];
        $marque = $_POST['marque'];
        $adresse = $_POST['adresse'];
        $montant = $_POST['montant'];
        $article_violation = $_POST['article_violation'];
        $date = $_POST['date'];

        Insert_contravention($no_dossier,$plaque,$couleur,$marque,$code_agent,$adresse,$article_violation,$montant,$date);
        echo("<a href='index_all_c.php'>Afficher</a>");

        exit; 
    }
}


    ?>

  
 
</body>
</html>

