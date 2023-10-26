<?php
    include_once("../useConnect.php");

    function Insert_agent($code_agent,$affectation,$nom,$prenom,$sexe,$password)
    {
        $con = use_mysqli();
        $sql = "INSERT INTO `dcpr`(`code_agent`, `affectation`, `nom`, `prenom`, `sexe`,`password`)
         VALUES ('$code_agent','$affectation','$nom','$prenom','$sexe',`password`)";

        $con->query($sql);
    }

    function select_agent_c($code_agent)
    {
        $con = use_mysqli();
        $sql = "SELECT `code_agent`, `affectation`, `nom`, `prenom`, `sexe`, `password`
         FROM `dcpr` WHERE `code_agent`='$code_agent'";

        $con->query($sql);

    
    }
    function count_agent_c($code_agent)
    {
        $con = use_mysqli();
        $sql = "SELECT `code_agent`, `affectation`, `nom`, `prenom`, `sexe`, `password`
         FROM `dcpr` WHERE `code_agent`='$code_agent'";
        $con->query($sql);
        $rs = $con->query($sql);
        $count = $rs->num_rows; 
        return $count;
    }


    
function login_agent($code_agent, $password)
{
    $con = use_mysqli();
    $sql = "SELECT `code_agent`, `affectation`, `nom`, `prenom`, `sexe`, `password`
    FROM `dcpr` WHERE `code_agent`='$code_agent'";

    $result = $con->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($row['password'] === $password) {
            // Mot de passe correct
            return $row;
        } else {
            // Mot de passe incorrect
            return null;
        }
    } else {
        // Aucun agent trouvé avec le code_agent donné
        return null;
    }
}

function contravention_agent($code_agent)
{
    $con = use_mysqli();
    $sql = "SELECT `code_agent`, `affectation`, `nom`, `prenom`, `sexe`, `password`
    FROM `dcpr` WHERE `code_agent`='$code_agent'";

    $result = $con->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if ($row['code_agent'] === $code_agent) {
            // code agent correct
            return $row;
        } else {
            // code agent incorrect
            return null;
        }
    } else {
        // Aucun agent trouvé avec le code_agent donné
        return null;
    }
}



    ?>

   






    