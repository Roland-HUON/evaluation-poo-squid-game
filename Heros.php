<?php
    require_once 'Ennemis.php';
    require_once 'Characters.php';//inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    // je l'inclus ici car seul les scripts Ennemis.php & Heros.php en ont besoin
    require_once 'utils.php'; // besoin de certaines fonctions aléatoires comme pour la triche...
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class Heros extends characters{
        private $malus; // déclare $malus en private car c'est une variable 
        private $gain;
        private $screem_war;

        // constructeur : définir les propriétés de la classe
        public function __construct($name, $marbles, $malus, $gain, $screem_war){
            parent::__construct($name, $marbles); // récupère le constructor du parent donc celui de characters.php
            $this->malus = $malus;
            $this->gain = $gain;
            $this->screem_war = $screem_war;
        }
        // getter malus
        public function getMalus(){
            return $this->malus;
        }
        // setter malus
        public function setMalus($malus){
            $this->malus = $malus;
        }
        public function getGain(){
            return $this->gain;
        }
        public function setGain($gain){
            $this->gain = $gain;
        }
        public function getScreemWar(){
            return $this->screem_war;
        }
        public function setScreemWar($screem_war){
            $this->screem_war = $screem_war;
        }
        // fonction loss
        // fais un echo des billes que le joueur perd
        public function loss($name, $marbles, $ennemisMarbles, $malus){
            $marblesCompa = -($ennemisMarbles + $malus);
            echo "Le joueur ".$name." a perdu " . $marblesCompa . " billes. <br>";
            return $marblesCompa;
        }
        // fonction gain
        // fais un echo des billes que le joueur gagne
        public function gain($name, $marbles, $ennemisMarbles, $gain){
            $marblesCompa = $ennemisMarbles+$gain;
            echo "Le joueur ".$name." a gagné " . $marblesCompa . " billes.<br>";
        }
        // fonction cheat 
        // fonctionnera dans Game.php si et seulement si l'ennemi a 70 ans
        public function cheat($listEnnemis, $ennemis, $name, $marbles, $ennemisMarbles, $gain){
            //chance de 50/50 : décide de tricher ou non
            $cheat = utils::random(0,1);
            // si $cheat == 1 alors je triche, sinon jouer normalement
            if ($cheat == 1){
                //je gagne
                return $this->gain($name, $marbles, $ennemisMarbles, $gain);
                //mon ennemi meurt/supprimer de l'array $listEnnemis
                array_splice($listEnnemis,$ennemis);
            }
        }
        public function choose($listEnnemis,$ennemis, $name, $marbles, $ennemisMarbles, $gain, $malus){ // fonction du pair ou impair en public parce qu'on veut savoir le choix du joueur
            $random = utils::random(0,1);
            $compare = $this->compareMarbles($ennemisMarbles);
            if($random==1){
                echo " Vous aviez choisi de dire : Impair ! <br>";
            } else{
                echo " Vous aviez choisi de dire : Pair ! <br>";
            }
            if ($random == $compare){
                return $this->gain($name, $marbles, $ennemisMarbles, $gain);
                array_splice($listEnnemis,$ennemis);
                var_dump(array_splice($listEnnemis,$ennemis, 1));
            } else {
                return $this->loss($name, $marbles, $ennemisMarbles, $malus);
            }
        }
        // fonction de comparaison des billes ennemis : pair = 0 | impair = 1
        // privée car les autres n'ont pas à savoir ça (intérieur de la télécommande)
        private function compareMarbles($ennemisMarbles){ 
            // reste de la division des billes ennemis divisé par 2
            $reste = $ennemisMarbles % 2;
            if($reste == 1){
                $compMarbles = 1;
                return $compMarbles;
            } else {
                $compMarbles = 0;
                return $compMarbles;
            }
        }
        // fonction public, on veut avoir un cri de guerre si on gagne
        // et un message pour dire que notre joueur a remporté le grand prix !
        public function victory($name, $victory){ 
            echo "<audio src=". $victory ."></audio>";
            echo "Le joueur " . $name . " a remporté 45,6 milliards de Won sud-coréen !";
        }
    }
    // Partie création du tableau des héros, chaque héros est un array en lui-même
    // les noms des héros sont dans un tableau
    $nomHero = array(
        "Seong Gi-hun",
        "Kang Sae-byeok",
        "Cho Sang-woo", 
    );
    // les billes des héros sont dans un tableau
    $heroMarbles = array(15,25,35);
    // les malus des héros sont dans un tableau
    $heroMalus = array(2,1,0);
    // les bonus des héros sont dans un tableau
    $heroGain = array(1,2,3);
    // les cris de victoire des héros sont dans un tableau
    $victory = array(
        "yes-se.mp3",
        "haha.mp3",
        "okay.mp3",
    );
    // $h servira à l'index des array pour que chaque héros à les bonnes informations de sa colonne uniquement
    $h = 0;
    // création d'un array vide où je met mes héros
    $listHero = array();
    // echo'<br>';
    // $hero0 = new Heros($nomHero[0], $heroMarbles[0],$heroMalus[0], $heroGain[0], $victory[0]);
    // var_dump($hero0);
    // echo'<br>';
    // echo $hero0->getMalus();
    foreach($nomHero as $hero){
        echo'<br>';
        $hero = new Heros($nomHero[$h], $heroMarbles[$h],$heroMalus[$h], $heroGain[$h], $victory[$h]);
        array_push($listHero, $hero);
        $h++;
    }
    // var_dump($listHero);
    // echo'<br>';
?>