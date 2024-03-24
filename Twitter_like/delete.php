<!DOCTYPE html>
<html>
<head>
    <title>Twitter-delete user</title>
    <link rel="stylesheet" href="index.css" />

</head>
<body>
    
</body>
</html>
<?php 

require 'database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST ['form'] == "suppr"){

    $idASupprimer = [
        'id' => $_POST['supprimer']
        ];


        $supp = $database->prepare('DELETE FROM user WHERE id = :id');
        $supp->execute($idASupprimer);
}
?>
<br><br>
<p>Utilisateur supprimé </p><br>
<p>Cliquer pour revenir sur Page de Twitter</p>




