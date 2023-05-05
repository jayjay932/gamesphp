

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="nav.css">
    
</head>
<body>


    <nav>
        <ul class="menu">
            <?php if (!isset($_SESSION['user'])) { ?>
                <li><a href="register.php">Créer un compte</a></li>
                <li><a href="login.php">Connexion</a></li>
            <?php } else { ?>
                <li><a href="persos.php"><?php echo $_SESSION['user']['email'] ?></a></li>

                <li><a href="mon_compte.php"> MON COMPTE </a></li>

                <li><a href="logout.php">Logout</a></li>
            <?php } ?>
        </ul>
    </nav>
</body>
</html>




