<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>
<body>
<br>
<h2>All Users</h2><br>
<?php require 'database.php';

foreach($users as $user) : ?>

    <form action="delete.php" method="POST">
        <input type="hidden" name="form" value="suppr">
        <br> <?php echo '<li>' . $user['pseudo'] .  '</li>'; ?> 

        <input type="hidden" name="supprimer" value="<?php echo $user['id']; ?>">
        <button type="submit">Supprimer</button>
    </form>

    <?php endforeach; ?>



<br><br>
<h2>S'inscrire</h2><br>

    <form action="database.php" method="POST">
        <input type="hidden" name="form" value="ajout-utilisateur">


        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo">

        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <label for="password">mot de passe</label>
        <input type="password" name="password" id="password">

        <button type="submit">Envoyer</button>
</form><br><br><br>
    
</body>
</html>