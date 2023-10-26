<!DOCTYPE html>
<html>
<head>
  <title>Connexion ou inscription</title>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <link rel="stylesheet" href="header1.css">
</head>
<body>
<?php
 include("header1.php");
 include_once("fDCPR.php");

?>

<h2>Connectez vous</h2>

<section>
<form method="post" action="#">
    <div class="user-details">
        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="text" placeholder=" code_agent " name="code_agent" required>
        </div>

        <div class="input-box">
            <span class="details">
            
            </span>
            <input type="password" name="password" placeholder="Mot de passe" required>
        </div>
       

        <div class="button">
        <input type="submit" value="connecter" name="btsave">
    </div>

</form>

    <h4>Pas encore inscrit ? <a href="DCPR.php">Inscrivez-vous ici</a></h4>
  
 
 <?php

if (isset($_POST['btsave'])) {
    $code_agent = $_POST['code_agent'];
    $password = $_POST['password'];

    $agent = login_agent($code_agent, $password);

    if ($agent) {
       echo" <a href='../first.php'>cliquez pour continuer</a>";

        exit;
    } else {
        echo "<h4>Identifiant ou mot de passe incorrect.</h4>";
    }
}
?>

    
  
</body>
</html>


