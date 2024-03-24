<?php
require 'database.php';

//Si le serveur reçoit une requette POST via le textarea, et que le textarea (contenu) n'est pas vide
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form']  == 'ajout') {
    if ($_POST['contenu'] != '') {
        //associer variable $nouveauTweet à chaque tweet via method POST
        $nouveauTweet = [
            'contenu' => $_POST['contenu'], 
            'user_id' => $_POST['user_id'] // ajout colonne 'user_id' à table 'tweet' / pour contenir l'id du user
        ];
        $requete = $database->prepare("INSERT INTO tweet (contenu, user_id) VALUES (:contenu, :user_id)");
        //si $nouveauTweet via method POST, associe avec succès les values "contenu" et "user_id"
        if ($requete->execute($nouveauTweet)) {
            echo "Tweet ajouté avec succès.";
        } else {
            //erreur lors de l'association des values "contenu" et "user_id"
            echo "Erreur lors de l'ajout du tweet";
        }
    } else {
        //en cas de problème non lié à POST et l'association du tweet à "contenu" et "user_id"
        echo 'Le contenu du Tweet ne peut pas être vide';
    }
}
?>
