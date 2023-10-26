<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../header.css">

</head>
<body>
    <?php
        include_once("../header.php");
        include_once("conducteur.php");
    ?>
    <table>
        <tr>
            <th>No_dossier</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Sexe</th>
            <th>Nif</th>
            <th><a href="conduc.php">ADD conducteur</a></th>
        </tr>
        <?php
         $tab= Select_conducteur();
         foreach($tab as $r)
         {
         ?>
            <tr>
                <td>
                    <?php echo($r['no_dossier']); ?>
                </td>
                <td>
                    <?php echo($r['nom']); ?>
                </td>
                <td>
                    <?php echo($r['prenom']); ?>
                </td>
                <td>
                    <?php echo($r['sexe']); ?>
                </td>
                <td>
                    <?php echo($r['nif']); ?>
                </td>
               
                <td>
                <a href="../contravention/index_c_conducteur.php?no_dossier=<?php echo($r['no_dossier']); ?>">
                contravention</a>
                </td>
                
                
            </tr>
         <?php }?>
    </table>
</body>
</html>