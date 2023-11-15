<?php
    require_once 'Ennemis.php';
    require_once 'Characters.php';//inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    // je l'inclus ici car seul les scripts Ennemis.php & Heros.php en ont besoin
    require_once 'utils.php'; // besoin de certaines fonctions aléatoires comme pour la triche...
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class Heros extends characters{
        private $malus;
        private $gain;
        private $screem_war;

        public function __construct($name, $marbles, $malus, $gain, $screem_war){
            parent::__construct($name, $marbles); // récupère le constructor du parent donc celui de characters.php
            $this->malus = $malus;
            $this->gain = $gain;
            $this->$screem_war = $screem_war;
        }
        public function getMalus(){
            return $this->malus;
        }
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
        public function loss($ennemisMarbles, $malus){
            return getMarbles() - ($ennemisMarbles + $malus);
            echo "Le joueur ".$name." a perdu " . $ennemisMarbles + $malus . " billes.";
        }
        public function gain($ennemisMarbles, $gain){
            $this->marbles = $marbles + $ennemisMarbles + $gain;
            echo "Le joueur ".$name." a gagné " . $ennemisMarbles+$gain . " billes.";
        }
        public function cheat(){
            gain();
            array_splice($listEnnemis,$ennemis);
        }
        public function choose($ennemisMarbles){ // fonction du pair ou impair en public parce qu'on veut savoir le choix du joueur
            $random = utils::random(0,1);
            $compare = $this->compareMarbles($ennemisMarbles);
            if ($random == $compare){
                gain();
            } else {
                loss();
            }
        }
        private function compareMarbles($ennemisMarbles){ // fonction privée car les autres n'ont pas à savoir ça (intérieur de la télécommande)
            $reste = $ennemisMarbles % 2;
            if($reste == 1){
                $compMarbles = 1;
                return $compMarbles;
            } else {
                $compMarbles = 0;
                return $compMarbles;
            }
        }
        public function victory(){ // fonction public, on veut avoir un cri de guerre si on gagne
            echo "<audio src=".$victory."></audio>";
            echo "Le joueur " . $name . " a remporté 45,6 milliards de Won sud-coréen !";
        }
    }
    $nomHero = array(
        "Seong Gi-hun",
        "Kang Sae-byeok",
        "Cho Sang-woo", 
    );
    $heroMarbles = array(15,25,35);
    $heroMalus = array(2,1,0);
    $heroGain = array(1,2,3);
    $victory = array(
        "yes-se.mp3",
        "haha.mp3",
        "okay.mp3",
    );
    $h = 0;
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