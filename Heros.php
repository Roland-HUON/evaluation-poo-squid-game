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
        private $marblesCompa;
        private $winner;
        private $loose;

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
        // getter gain
        public function getGain(){
            return $this->gain;
        }
        //getter screemwar
        public function getScreemWar(){
            return $this->screem_war;
        }
        public function setScreemWar($screem_war){
            $this->screem_war = $screem_war;
        }
        // fonction loss
        // fais un echo des billes que le joueur perd
        public function loss($name, $marbles, $ennemisMarbles, $malus){
            // double $ennemisMarbles et Malus sans que je ne sache pourquoi
            // $this->marblesCompa = -($ennemisMarbles + $malus);
            // echo $this->marblesCompa;
            // $lost = array(
            //     "Le joueur ".$name." a perdu " . $this->marblesCompa . " billes. <br>", 
            //     $this->marblesCompa
            // );
            // return $lost;
        }
        // fonction gain
        // fais un echo des billes que le joueur gagne
        public function gain($name, $marbles, $ennemisMarbles, $gain){
            // // echo $ennemisMarbles;
            // $this->marblesCompa = $ennemisMarbles+$gain;
            // // echo $this->marblesCompa;
            // $win = array(
            //     "Le joueur ".$name." a gagné " . $this->marblesCompa . " billes.<br>", 
            //     $this->marblesCompa
            // );
            // return $win;
        }
        // fonction cheat 
        // fonctionnera dans Game.php si et seulement si l'ennemi a 70 ans
        public function cheat($listEnnemis, $ennemis, $name, $marbles, $ennemisMarbles, $gain){
            // je gagne
            // $this->winner = $this->gain($name, $marbles, $ennemisMarbles, $gain)[1];
            $this->winner = $ennemisMarbles + $gain;
            // echo $this->winner;
            //mon ennemi meurt/supprimer de l'array $listEnnemis
            array_splice($listEnnemis, $ennemis, 1);
            echo "Le joueur ".$name." a gagné " . $this->winner . " billes.<br>";
            // return $this->gain($name, $marbles, $ennemisMarbles, $gain)[0];
        }
        // retourne le nombre de billes gagner et/ou perdue
        public function getWinner(){
            return $this->winner;
        }
        // fonction choose
        // retourne notre choix (pair ou impair en aléatoire), 
        // si on a gagné ou perdu ainsi que le nombre de billes
        public function choose($listEnnemis,$ennemis, $name, $marbles, $ennemisMarbles, $gain, $malus){ // fonction du pair ou impair en public parce qu'on veut savoir le choix du joueur
            // choix si le joueur dit pair ou impair
            $random = utils::random(0,1);
            // valeur de fonction comparemarbles dans variables compare
            $compare = $this->compareMarbles($ennemisMarbles);
            // si variable random = 1 alors le joueur choisit impair
            if($random==1){
                echo " Vous avez choisi de dire : Impair ! <br>";
                // sinon choisi pair
            } else {
                echo " Vous avez choisi de dire : Pair ! <br>";
            }
            // vérification si choix du joueur correspond à la value de compare
            // si correspond
            if ($random == $compare){
                $this->winner = $ennemisMarbles + $gain;
                // echo $this->winner;

                // $this->winner = $this->gain($name, $marbles, $ennemisMarbles, $gain)[1];
                // echo $this->winner;
                array_splice($listEnnemis, $ennemis, 1);
                // echo $this->gain($name, $marbles, $ennemisMarbles, $gain)[0];
                echo "Le joueur ".$name." a gagné " . $this->winner . " billes.<br>";
                // sinon le joueur perd des billes
            } else {
                $www = ($ennemisMarbles + $malus);
                $this->winner = -$www;
                // echo $this->winner;
                // $this->winner = $this->loss($name, $marbles, $ennemisMarbles, $malus)[1];
                // echo $this->loss($name, $marbles, $ennemisMarbles, $malus)[0];
                echo "Le joueur ".$name." a perdu " . $this->winner . " billes.<br>";
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
            echo $victory . "<br>Le joueur " . $name . " a remporté 45,6 milliards de Won sud-coréen !";
        }
    }
?>