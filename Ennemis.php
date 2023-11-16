<?php
    require_once 'utils.php';
    require_once 'Characters.php';//inclus le fichier Characters.php car on nous appris que chaque class était un fichier en entreprise
    // je l'inclus ici car seul les scripts Ennemis.php & Heros.php en ont besoin
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class Ennemis extends characters{
        //je déclare la variable $age en privée
        private $age;
        // constructeur : définir les propriétés de la classe
        public function __construct($name, $marbles, $age){
            // récupère le constructor du parent donc celui de characters.php
            parent::__construct($name, $marbles); 
            $this->age = $age;
        }
        // getter age
        public function getAge(){
            return $this->age;
        }
        // setter age
        public function setAge($age){
            $this->age = $age;
        }
        // function loss, ces billes seront à 0, sert pas à grand chose 
        // vu que l'on supprime de l'array si il perd
        public function loss($name, $marbles, $ennemisMarbles, $malus){
            echo $marbles();
            return getMarbles() - getMarbles();
        }
        // function gain, ces billes resteront la même chose, sert pas à grand chose 
        public function gain($name, $marbles, $ennemisMarbles, $gain){
            return getMarbles();
        }
    }
    // Création des ennemis
    // noms des ennemis dans un array
    $nomEnnemis = array(
        "Victor", "Steve", "Louis", "Silvain", "Luc",
        "Antoine", "Marc", "Julius", "Henry", "Franck",
        "Bruno", "Jeremy", "Pierre", "Antoine", "Léo",
        "Kleine", "Larry","Jean","Jack","Julius", 
    );
    // $i permet d'obtenir seulement un nom à chaque fois, si il n'était pas là 
    // j'aurais toute une série de nom pour chaque ennemi
    $i = 0;
    // création d'un tableau vide dans lequel je vais mettre mes ennemis
    $listEnnemis = array();
    foreach($nomEnnemis as $ennemis){
        // j'instancie/crée des nouveau ennemis avec un nom, 
        // un nombre de bille random et un age random
        $ennemis = new Ennemis($nomEnnemis[$i], utils::random(1,20), utils::random(18,99));
        // je push mes ennemis dans le tableau vide
        array_push($listEnnemis, $ennemis);
        // j'incrémente i de 1
        $i++;
    }
    // var_dump($listEnnemis);
?>