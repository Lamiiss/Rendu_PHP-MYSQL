<!DOCTYPE html>
<html>
<head>
    <title>Twitter-ajout</title>
    <link rel="stylesheet" href="index.css" />

</head>
<body>
    
</body>
</html>

<?php
try {

$database = new PDO('mysql:host=localhost;dbname=twitter' , 'root', '');

}catch(PDOException $e) {
    die('Site indisponible');
}

//Sélection de toutes les informations du user
$requete = $database->prepare("SELECT * FROM user");
$requete->execute();

$users = $requete->fetchAll(PDO::FETCH_ASSOC);



//////////////////////////////////////////////////////// Ajouter user

// Si le champ "pseudo" "email" "password" correctement rempli, ajout user, method POST + affiche message de succès
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['form'] == 'ajout-utilisateur') {                                             

    //$nouvelUser associé au user si "pseudo" "email" "password" rajoutés à l'aide de la method POST
    if($_POST['pseudo'] != '' && $_POST['email']){
        $nouvelUser = [
            'pseudo' => $_POST['pseudo'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ];

        $requete = $database->prepare("INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email,
        :password) ");

        if ($requete->execute($nouvelUser) ){
            //les champs bien remplis
            echo "Utilisateur ajouté"; 
        } else {
            //si erreur lors du POST du "pseudo" "email" "password" du $nouvelUtilisateur
            echo "Erreur lors de l'ajout" ;
        }
    } else{
        //Si erreur non liée au POST des 3 données du $nouvelUser
        echo 'formulaire incomplet';
    }

} ?>

<!-- Bouton renvoit à la page des tweets -->
<button><a href="index.php" title="Page de Tweet">Accèder à Twitter</button></a>
