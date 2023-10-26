




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enregistrer conducteur</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../header.css">


</head>
<body>
<?php
 include("../header.php");
 include_once("conducteur.php");

?>



<h2>ENREGISTREMENT CONDUCTEUR</h2>
<section>
<form method="post" action="#" >
    <div class="user-details">
        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" name="txtnom" placeholder="  Nom " required>
        </div>

        <div class="input-box">
            <span class="details">
            </span>
            <input type="text" name="txtprenom" placeholder=" Prenom" required>
        </div>

        <div class="rd">
            <input type="radio" name="rdsexe" id=""  required value="Masculin">
            <span class="details">Homme</span>

            <input type="radio" name="rdsexe" id="" required value="Feminin">
            <span class="details">Femme</span>
            
        </div>


        <div class="input-box">
        <?php
        if (isset($_POST['btsave'])) {
        $nif = $_POST['nif'];
    
        $nif_exist = Select_conducteurNif($nif);
        if ($nif_exist > 0) { 
        echo "Ce conducteur avec le NIF : $nif existe déjà.";
        echo "<a href='../contravention/save_contravention.php'>enregistrez la contravention ici</a>";
        exit; 
    }
}
    ?>
            <span class="details">
            
            </span>
            <input type="text" name="nif" placeholder=" Nif" required>
          


    
        </div>

    </div>

    <div class="button">
        <input type="submit"  name="btsave" value="Enregistrer">
    </div>

</form>
</section>


<?php
       

if (isset($_POST['btsave'])) {
    $nif = $_POST['nif'];
    
    $nif_exist = Select_conducteurNif($nif);
    if ($nif_exist > 0) { 
        
        exit; 
    } else {
        $nom = $_POST['txtnom'];
        $prenom = $_POST['txtprenom'];
        $sexe = $_POST['rdsexe'];

        Insert_conducteur($nom, $prenom, $sexe, $nif);
        echo("<a href='index.php'>cliquez pour afficher</a>");
        exit; 
    }
}
?>
    

</body>    
</html>