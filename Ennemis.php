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
?>