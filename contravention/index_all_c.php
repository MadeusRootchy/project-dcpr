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
        include_once("contravention.php");
        include_once("../dgi/dgi.php");

    ?>
    <table>
        <tr>
            <th>No_fiche</th>
            <th>No_dossier</th>
            <th>Plaque</th>
            <th>Couleur</th>
            <th>Marque</th>
            <th>Code_agent</th>
            <th>Adresse</th>
            <th>Article_violation</th>
            <th>montant_a_payer</th>
            <th>Date</th>
            <th>Lister par</th>
            <th>Nombre contravention</th>
            <th>Status</th>
            <th><a href="save_contravention.php">Nouveau contravention</a></th>
        </tr>
        <?php
        
        $tab = Select_contravention();
         foreach($tab as $r)
         {
         ?>
            <tr>
                <td>
                    <?php echo($r['no_fiche']); ?>
                </td>
                <td>
                    <?php echo($r['no_dossier']); ?>
                </td>
                <td>
                    <?php echo($r['plaque_vehicule']); ?>
                </td>
                <td>
                    <?php echo($r['couleur']); ?>
                </td>
                <td>
                    <?php echo($r['marque']); ?>
                </td>
                 <td>
                    <?php echo($r['code_agent']); ?>
                </td>
                 <td>
                    <?php echo($r['adresse']); ?>
                </td>
                 <td>
                    <?php echo($r['article_violation']); ?>
                </td> 
                <td>
                    <?php echo($r['montant_a_payer']); ?>
                </td>
                 <td>
                    <?php echo($r['date_contravention']); ?>
                </td>
                <td>
                    <ul>
                        <li><a href="index_c_agent.php?code_agent=<?php echo($r['code_agent']); ?>">/agent</a>
                    </li>
                        <li><a href="index_c_conducteur.php?no_dossier=<?php echo($r['no_dossier']); ?>">/conducteur</a>
                        </li>
                        <li><a href="contravention_journee.php?date_contravention=<?php echo($r['date_contravention']); ?>">/jour</a>         
                        </li>
                        <li><a href="contravention_annee.php?date_contravention=<?php echo($r['date_contravention']);?>&no_dossier=<?php echo($r['no_dossier']); ?>">/annee</a>         
                        </li>
                    </ul>
                </td>

                <td>
                        <?php
                         $no_dossier = $r['no_dossier'];
                        $count = Count_contra($no_dossier);
                        if($count<4)
                        echo $count;
                        if($count>3){
                            echo "Recyclage";
                         }
                        ?> 
                </td>

                <td>
                <?php
                    $no_fiche = $r['no_fiche'];
                    $status = select_status_contravention($no_fiche);
                    if ($status =="n_pay" ) {
                        echo "Non payé";
                    } elseif($status =="pay")
                    {
                        echo "Payé";
                    }
                    else{
                        exit;
                    }
                  
                ?>
                </td>
                <td> <?php
                    $no_fiche = $r['no_fiche'];
                    $status = select_status_contravention($no_fiche);
                    if ($status =="n_pay" ) {
                       echo" <a href='../dgi/insertd.php'>cliquez pour payer</a>";

                    }
                  
                ?>

                </td>
              
            </tr>
         <?php }?>
    </table>
</body>
</html>