<!DOCTYPE html>
<html>
<head>
    <title>Twitter</title>
    <link rel="stylesheet" href="index.css" />
    
    
</head>
<body>
    <?php require 'database.php'; ?>
        <!-- Bouton renvoit à la page d'inscription -->
        <button><a href="ajout-user.php" title="Inscription">Ajouter Utilisateur</button></a>



<!------------------------------------------ Filtration par utilisateur ---------------------------------------------->



<!--------------------- Formulaire pour sélectionner l'utilisateur (pseudo) et l'ordre d'affichage (récent/ancien) -------------------->

<!-- Sélectionner un utilisateur via method GET, via "option", en récupérant (GET) les donnés des users  -->
<form action="index.php" method="GET"><br>
    <label for="utilisateur">Filtrer Tweets par utilisateur :</label>
    <select name="utilisateur" id="utilisateur">
        <option value="">Pseudos</option>
        <?php foreach ($users as $user): ?>
            <!-- Afficher les "option" en faisant appel aux donnés des user, puis en spécifiant l'information du user que nous souhaitons afficher (pseudo) -->
            <option value="<?php echo $user['id']; ?>"><?php echo $user['pseudo']; ?></option>
        <?php endforeach; ?>
    </select>

    <!-- bouton 'option' ordre -->
    <label for="ordre">Ordre d'affichage :</label>
    <select name="ordre" id="ordre">
        <option value="plus_recent">Du plus récent</option>
        <option value="plus_ancien">Du plus ancien</option>
    </select>

    <button type="submit">Filtrer</button>
</form><br>

<!-- Traitement PHP pour trier les tweets -->
<?php
// récupérer tous les tweets avec les données associés
$recherche_tweet = "SELECT * FROM tweet INNER JOIN user ON tweet.user_id = user.id";
//si une "option" est choisi, (champ n'est pas vide), récupérer toutes les donnés du user via id
if (!empty($_GET['utilisateur'])) {
    $recherche_tweet .= " WHERE user.id = :user_id";
}

/////// logique php pour 'option' changement d'ordre d'affichage
if (!empty($_GET['ordre'])) {
    if ($_GET['ordre'] == 'plus_recent') {
        //'DESC' ,  tweets ajoutés en dernier
        $recherche_tweet .= " ORDER BY tweet.date_creation DESC";
    } elseif ($_GET['ordre'] == 'plus_ancien') {
        //'ASC' tweets ajoutés en premier
        $recherche_tweet .= " ORDER BY tweet.date_creation ASC";
    }
}
/////////////////////

$tweets = $database->prepare($recherche_tweet);

//Si option 'pseudo' pas vide , récupérer les donnés du user
if (!empty($_GET['utilisateur'])) {
    //indiquer que 'utilisateur' est une chaîne de caractères
    $tweets->bindParam(':user_id', $_GET['utilisateur'], PDO::PARAM_INT);
}

$tweets->execute();
?>

<!-- Afficher les tweets filtrés par pseudo et triés selon l'ordre choisi -->
<ul>
    <?php foreach ($tweets as $tweet): ?>
        <li>
            <!-- afficher le pseudo et le rendre plus visible en le rendant "bold" -->
            <strong><?php echo $tweet['pseudo']; ?>:</strong>
            <!-- Afficher le/les 'tweet' -->
            <?php echo $tweet['contenu']; ?>
        </li>
    <?php endforeach; ?>
</ul>

<!----------------------------------------------------------------------------------------------------------------->







<!------------------------------------------ Recherche de tweet ----------------------------------------------------------->


    <!-- Bouton recherche de tweet, method GET -->
    <form action="index.php" method="GET"><br><br>
        <label for="recherche">Rechercher des Tweets :</label>
        <input type="text" name="recherche" id="recherche">
        <button type="submit">Rechercher</button>
    </form>


    <!-- Ajout tweet aven 'textarea' -->
    <!-- Post textarea du user, method POST -->
    <?php foreach ($users as $user): ?>
        <h2><br><br><?php echo $user['pseudo']; ?></h2>
        <!-- appeler 'tweet.php' -->
        <form action='tweet.php' method="POST">
        <input type="hidden" name="form" value="ajout">
            <label for="contenu">Votre Tweet</label>
            <textarea name="contenu" id="tweet" cols="30" rows="8"></textarea>                                   
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
            <button type="submit">Poster</button>
        </form> <br>


        <ul>
            <!-- Chaque Tweet est lié à l'id du user -->
            <?php
            $recherche_tweet = "SELECT * FROM tweet WHERE user_id = :user_id";

            // Si le champ de recherche n est pas vide, method GET à partir du saisis dans le champ
            if (!empty($_GET['recherche'])) {
                $searchTerm = '%' . $_GET['recherche'] . '%';
                $recherche_tweet .= " AND contenu LIKE :searchTerm";
            }

            $tweets = $database->prepare($recherche_tweet);
            $tweets->bindParam(':user_id', $user['id']);

            //Si le champ de 'recherche' est vide, pas de recherches
            if (!empty($_GET['recherche'])) {
                //permet de d'associer mots recherchés à mots dans un tweets
                $searchTerm = '%' . $_GET['recherche'] . '%';
                //indiquer que $searchTerm est une chaîne de caractères
                $tweets->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
            }

            
            $tweets->execute();
            $userTweets = $tweets->fetchAll(PDO::FETCH_ASSOC);

    //<!----------------------------------------------------------------------------------------------------------------->

    // <!--------------------------------------- Supprimer un tweet ---------------------------------------------------------->

            foreach ($userTweets as $tweet): ?>
                <li>
                    <!-- Supprimer le tweet lié à l'id du user, method POST -->
                    <?php echo $tweet['contenu']; ?>
                    <!-- appeler 'delete_tweet' -->
                    <form action="delete_tweet.php" method="POST">
                        <input type="hidden" name="form" value="suppr">
                        <input type="hidden" name="supprimer" value="<?php echo $tweet['id']; ?>">
                        <button type="submit">Supprimer tweet</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>


</body>
</html>
