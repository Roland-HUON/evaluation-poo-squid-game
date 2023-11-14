<?php
    require_once 'Characters.php';//inclus le fichier Characters.php car on nous appris que chaque class était un fichier en entreprise
    // je l'inclus ici car seul les scripts Ennemis.php & Heros.php en ont besoin
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class Ennemis extends characters{
        private $age;
        public function __construct($age){
            $this->age = $age;
        }
        public function getAge(){
            return $this->age;
        }
        public function setAge($age){
            $this->age = $age;
        }
        public function loss(){
            echo getMarbles();
            return getMarbles() - getMarbles();
        }
        public function gain(){
            return getMarbles();
        }
    }
    $cat = new Ennemis("Cat", 25, 70);
    $cat->loss();
?>