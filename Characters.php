<?php
    abstract class characters{
        private $name;
        private $marbles;
    
        public function __construct($name, $marbles){
            $this->name = $name;
            $this->marbles = $marbles;
        }
        public function getName(){
            return $this->name;
        }
        public function getMarbles(){
            return $this->marbles;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function setMarbles($marbles){
            $this->marbles = $marbles;
        }
        abstract public function loss();
        abstract public function gain();
    }
?>