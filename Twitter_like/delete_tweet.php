<?php
//appel informations stockés via method POST
require 'database.php';

//Si le serveur reçois requette POST, et que cette requêtte à une value "suppr" qui provient du form dans "index.php"
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == "suppr") {
    $idASupprimer = ['id' => $_POST['supprimer']];
    //supprimer tweet, stocké via l'id associé au tweet 
    $supp = $database->prepare('DELETE FROM tweet WHERE id=:id');
    $supp->execute($idASupprimer);
    
}
?>
<p>Tweet supprimé !</p>
<p>Cliquer pour revenir sur Page de Twitter</p>