<?php
    // class abstract car des fonctions sont abstract 
    // (besoin de les définir dans les class enfants)
    abstract class characters{
        // déclaration des variables name et marbles en privée
        private $name;
        protected $marbles;
        // constructeur : définir les propriétés de la classe
        public function __construct($name, $marbles){
            $this->name = $name;
            $this->marbles = $marbles;
        }
        //getter name
        public function getName(){
            return $this->name;
        }
        //getter marbles
        public function getMarbles(){
            return $this->marbles;
        }
        //setter marbles
        public function setMarbles($winner){
            // problème en négatif ça fait des choses incohérentes et aléatoire...
            // echo $winner;
            return $this->marbles = $this->getMarbles() + $winner;
        }
        // abstract car loss() et gain() ne sont pas les mêmes pour les deux
        // a eux de les définir dans chacun de leur classe
        // loss() pour la perte de billes
        abstract public function loss($name, $marbles, $ennemisMarbles, $malus);
        // gain() pour le gain de billes, prend en compte plusieurs paramètres
        abstract public function gain($name, $marbles, $ennemisMarbles, $gain);
    }
?>