<?php

class Room {
    private string $name;
    private string $description;
    private string $type;
    private int $donjon_id;
    private int $or;
    private int $vie;

    

    public function __construct($room)
    {
        $this->name = $room['name'];
        $this->description = $room['description'];
        $this->type = $room['type'];
        $this->donjon_id = $room['donjon_id'];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    //afficher les phrases des salles
    public function getHTML(): string
    {
        $html = "";

        switch ($this->type) {
            case 'vide':
                $html .= "<p class='mt-4'><a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continuer l'exploration</a></p>";
                break;

            case 'treasur':
                $html .= "<p class='mt-4'>Vous avez gagné " . $this->or . " pièce d'or</p>";
                $html .= "<p class='mt-4'><a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-green'>Continuer l'exploration</a></p>";
                break;

            case 'combat':
                $html .= "<p class='mt-4'><a href='donjon_fight.php?id=". $this->donjon_id ."' class='me-2 btn btn-green'>Combattre</a>";
                $html .= "<a href='donjon_play.php?id=". $this->donjon_id ."' class='btn btn-blue'>Fuir et continuer l'exploration</a></p>";
                break;
            



                case 'salle_de_vie':
                 $html .= "<p class='mt-4'>Vous avez " . $_SESSION['perso']['point'] . " point de vie </p>";
                 break;

           
                 if($_SESSION['perso']['point'] <0){

                    $html .= "<p class='mt-4'>Vous ete  mort </p>";

                 }


            default:
                $html .= "<p>Aucune action possible !</p>";
                break;



                 
        }
        

        return $html;
}




//faire l'action lié aux salles
    public function makeAction(): void
    {
        switch ($this->type) {
            case 'vide':
                break;

            case 'treasur':
                $this->or = rand(0, 20);
                $_SESSION['perso']['gold'] += $this->or;
                break;

            case 'combat':
                break;

            case 'salle_de_vie':
                if($_SESSION['perso']['point'] <1){
                    $this->vie = rand(1, 10);
                    $_SESSION['perso']['point'] += $this->vie;




                      
                }





                break;
            default:
                break;
        }
    }
    
}