<?php
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

        }
        public function gain(){

        }
    }
?>