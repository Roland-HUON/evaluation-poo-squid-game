<?php
    class utils{
        public $random;
        public function randomChoose(){
            $random = rand(0,1);
        }
        // public function __construct(){
        //     $this->random = $random;
        // }
        // public function getRandom(){
        //     return $this->random;
        // }
        // public function setRandom($random){
        //     $this->random = $random;
        // }
        // public function randomChoose(){
        //     $this->random = rand(0,1);
        // }
    }
    echo randomChoose();
?>