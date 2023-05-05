


<?php
    // Vérifier que l'utilisateur est connecté
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }

    // Récupérer les informations de l'utilisateur
    $user = $_SESSION['user'];
    $email = $user['email'];
    $password = $user['password'];
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon compte</title>
    <link rel="stylesheet" href="mon_compte.css">
</head>
<body>
    <?php require_once('_nav.php'); ?>
    <h1>Mon compte</h1>
    
    
    <h2>Mes informations</h2>
    <p>Nom: <?php echo isset($user['nom']) ? $user['nom'] : ''; ?></p>
<p>Prénom: <?php echo isset($user['prenom']) ? $user['prenom'] : ''; ?></p>
    
    <h3>Modifier mon adresse e-mail et mot de passe </h3>
   <a href="edit_compt.php"> modifier</a>
    
    <h2>Supprimer mon compte</h2>
    

    
    


<a href="delete_account.php">Supprimer mon compte</a>



       
        <h2>Mes informations</h2>
    <p>E-mail: <?php echo $email; ?></p>
    <p>Mot de passe: <?php echo $password; ?></p>

       
    </form>
</body>
</html>