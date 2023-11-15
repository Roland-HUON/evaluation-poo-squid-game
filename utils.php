<?php
    //fonction utilisé pour généré un nombre aléatoire
    class utils{
        public static function random($min, $max){ //static car appartient à la class utils
            return rand($min, $max); //retourne le nombre entier aléatoire $min pour le chiffre minimal et $max pour le chiffre maximum
        }
    }
?>