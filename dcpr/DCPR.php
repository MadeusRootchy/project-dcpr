<?php
include_once("fDCPR.php");

if (isset($_POST['btsave'])) {
    $code_agent = $_POST['code_agent'];

    $code_agent_exist = count_agent_c($code_agent);
    if ($code_agent_exist > 0) {
        echo "<h4>Ce compte existe déjà sur le système.</h4>
            <a href='Connection.php'>Se connecter</a>";
        exit;
    }
}

if (isset($_POST['btsave'])) {
    $code_agent = $_POST['code_agent'];

    $code_agent_exist = count_agent_c($code_agent);
    if ($code_agent_exist > 0) {
        exit;
    } else {
        $affectation = $_POST['affectation'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['rdsexe'];
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];

        if ($pass1 === $pass2 && empty($code_agent_exist)) {
            Insert_agent($code_agent, $affectation, $nom, $prenom, $sexe, $pass1);
            echo" <a href='../first.php'>cliquez pour continuer</a>";
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DCPR projet</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="header1.css">

</head>
<body>
    <?php
include("header1.php");
include_once("fDCPR.php");


    ?>
<h2>INSCRIRE</h2>
<section>

      
<form method="post" action="#">
    <div class="user-details">
        <div class="input-box">
        
     
            <span class="details">
            
            </span>
            <input type="text" placeholder=" code_agent" name="code_agent" required>
        </div>

        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder="affectation" name="affectation" required>
        </div>

        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder=" nom" name="nom" required>
        </div>
        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="text" placeholder=" Prenom" name="prenom" required>
        </div>

        <div class="rd">
            <input type="radio" name="rdsexe" id=""  required value="Masculin">
            <span class="details">Homme</span>

            <input type="radio" name="rdsexe" id="" required value="Feminin">
            <span class="details">Femme</span>
            
        </div>
  <?php      
if(isset($_POST['btsave']))
{
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if ($pass1 === $pass2) {
} 
else {
    echo "<h4>Les mots de passe ne correspondent pas. Veuillez réessayer.</h4>";
}
}
?>

        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="password"  name="pass1" placeholder="Mot de passe">

        </div> 
        <div class="input-box">
            <span class="details">
                
            </span>
            <input type="password"  name="pass2" placeholder="confirme Mot de passe">

        </div> 
   

        <div class="button">
        <input type="submit" value="Enregistrer" name="btsave">
    </div>
</form>



    

</body>
</html>