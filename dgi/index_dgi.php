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
        include_once("dgi.php");
    ?>
    <table>
        <tr>
            <th>No_fiche</th>
            <th>Montant</th>
            <th>Remarque</th>
            <th>Date</th>
            <th><a href="insertd.php">payer contravention</a></th>
        </tr>
        <?php
         $tab= Select_dgi();
         foreach($tab as $r)
         {
         ?>
            <tr>
                <td>
                    <?php echo($r['no_fiche']); ?>
                </td>
                <td>
                    <?php echo($r['montant']); ?>
                </td>
                <td>
                    <?php echo($r['remarque']); ?>
                </td>
                <td>
                    <?php echo($r['date_paiement']); ?>
                </td>
                <td></td>
           
            </tr>
         <?php }?>
    </table>
</body>
</html>