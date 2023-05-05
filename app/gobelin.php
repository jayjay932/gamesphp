<?php

require_once('/ennemi.php');



//lier gobelin a ennemi pour faire gobelin.ennemi
class gobelin extends ennemi{

public function __construct(){

    $this->pdv =3;
    $this->nom ="gobelin" ;
    $this->puissance = 10;
    $this->constitution = 8;
    $this->vitesse= 7;
    $this->xp = 4;
}

public function runaway(){






    
}



}
