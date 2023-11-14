<?php
    require_once 'utils.php';
    require_once 'Characters.php';//inclus le fichier Characters.php car on nous appris que chaque class était un fichier en entreprise
    // je l'inclus ici car seul les scripts Ennemis.php & Heros.php en ont besoin
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class Ennemis extends characters{
        private $age;
        public function __construct($name, $marbles, $age){
            parent::__construct($name, $marbles); // récupère le constructor du parent donc celui de characters.php
            $this->age = $age;
        }
        public function getAge(){
            return $this->age;
        }
        public function setAge($age){
            $this->age = $age;
        }
        public function loss(){
            echo $marbles();
            return getMarbles() - getMarbles();
        }
        public function gain(){
            return getMarbles();
        }
        public function random($min, $max){
            $random = rand($min, $max);
            echo $random;
        }
    }
    $nomEnnemis = array(
        "Victor", "Steve", "Louis", "Silvain", "Luc",
        "Antoine", "Marc", "Julius", "Henry", "Franck",
        "Bruno", "Jeremy", "Pierre", "Antoine", "Léo",
        "Kleine", "Larry","Jean","Jack","Julius", 
    );
    $i = 0;
    $listEnnemis = array();
    foreach($nomEnnemis as $ennemis){
        $ennemis = new Ennemis($nomEnnemis[$i], utils::random(1,20), utils::random(18,99));
        array_push($listEnnemis, $ennemis);
        $i++;
    }
    var_dump($listEnnemis);
?>