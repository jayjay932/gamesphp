<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    $bdd = connect();

    $sql = "SELECT * FROM persos WHERE id = :id and user_id = :user_id";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'user_id'     => $_SESSION['user']['id'],
        'id'          =>$_GET['id']
    ]);

    $perso = $sth->fetch();
    $_SESSION['perso']=$perso;
   

    header('location: donjons.php')

?>