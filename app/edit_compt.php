<?php
require_once('functions.php');

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}

// Si le formulaire est soumis
if (isset($_POST["send"])) {
    $bdd = connect();

    // Vérifier que l'email n'est pas déjà utilisé par un autre utilisateur
    $sql = "SELECT * FROM users WHERE `email` = :email AND `id` != :user_id;";
    $sth = $bdd->prepare($sql);
    $sth->execute([
        'email' => $_POST['email'],
        'user_id' => $_SESSION['user']['id']
    ]);
    $user = $sth->fetch();

    if (!$user) {
        // Mettre à jour l'adresse email et/ou le mot de passe de l'utilisateur connecté
        $sql = "UPDATE users SET `email` = :email, `password` = :password WHERE `id` = :user_id;";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'user_id' => $_SESSION['user']['id']
        ]);

        // Mettre à jour les informations de session
        $_SESSION['user']['email'] = $_POST['email'];

        // Rediriger vers la page d'accueil
        header('Location: index.php');
    } else {
        $msg = "Cette adresse email est déjà utilisée par un autre utilisateur.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once('_nav.php'); ?>
    <form action="" method="post">
        <h1>Modification de profil</h1>

        <?php if (isset($msg)) { echo "<div>" . $msg . "</div>"; } ?>

        <div>
            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email']; ?>" />
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" />
        </div>
        <div>
            <input type="submit" name="send" value="Enregistrer" />
        </div>
    </form>
</body>
</html>
