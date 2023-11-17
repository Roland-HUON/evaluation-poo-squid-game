<?php
    require_once 'Heros.php'; //inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    require_once 'Ennemis.php'; //inclus le fichier Ennemis.php car on nous appris que chaque class était un fichier en entreprise
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class game{
        public function match(){

        }
    }
    // Création des ennemis
    // noms des ennemis dans un array
    $nomEnnemis = array(
        "Victor", "Steve", "Louis", "Silvain", "Luc",
        "Antoine", "Marc", "Julius", "Henry", "Franck",
        "Bruno", "Jeremy", "Pierre", "Antoine", "Léo",
        "Kleine", "Larry","Jean","Jack","Julius", 
    );
    // $i permet d'obtenir seulement un nom à chaque fois, si il n'était pas là 
    // j'aurais toute une série de nom pour chaque ennemi
    $i = 0;
    // création d'un tableau vide dans lequel je vais mettre mes ennemis
    $listEnnemis = array();
    foreach($nomEnnemis as $ennemis){
        // j'instancie/crée des nouveau ennemis avec un nom, 
        // un nombre de bille random et un age random
        $ennemis = new Ennemis($nomEnnemis[$i], utils::random(1,20), utils::random(18,99));
        // je push mes ennemis dans le tableau vide
        array_push($listEnnemis, $ennemis);
        // j'incrémente i de 1
        $i++;
    }
    // var_dump($listEnnemis);

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
        "Yes !!!",
        "HAHAHA",
        "Okay...",
    );
    // $h servira à l'index des array pour que chaque héros à les bonnes informations de sa colonne uniquement
    $h = 0;
    // création d'un array vide où je met mes héros
    $listHero = array();
    foreach($nomHero as $hero){
        echo'<br>';
        $hero = new Heros($nomHero[$h], $heroMarbles[$h],$heroMalus[$h], $heroGain[$h], $victory[$h]);
        array_push($listHero, $hero);
        $h++;
    }

    // nombre aléatoire qui va définir le niveau de difficulté
    $randomLevel = utils::random(0,2);
    // sélection d'un héros aléatoire grâce à un chiffre aléatoire
    $randomHero = utils::random(0,2);
    // sélection du héro aléatoire
    $hero = $listHero[$randomHero];
    // echo du héro aléatoire / personnage du joueur + nombre de bille du joueur
    // nom joueur
    echo "Vous incarnez le joueur " . $hero->getName() . ".";
    // nombre billes
    echo "Votre joueur possède " . $hero->getMarbles() . " marbles";
    echo "<br>";
    // $marblesPlayer = $hero->getMarbles();
    // sert à monter de niveau
    $level = 0;
    //nombre de match à disputer dépendant du niveau de difficulté
    $match = array(5, 10, 20);
    $matchChoose = $match[$randomLevel];
    // sert à l'option relancé
    $life = 0;
    // sert à donner le nombre de billes au départ
    $start = 0;
    // mettre dans une variable le nombre de billes
    $marblesPlayer = $hero->getMarbles();
    // niveau facile
    if ($randomLevel == 0){
        echo "Le niveau de difficulté est le niveau facile.";
        echo "<br>";
        //boucle de matchs
        while ($level<$matchChoose){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            $randomEnnemis = utils::random(0,count($listEnnemis)-1);
            $ennemi = $listEnnemis[$randomEnnemis];
            if($start < 1){
                $start++;
                echo "Votre joueur possède " . $marblesPlayer . " marbles. <br>";
            } else {
                echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
            }
            echo "Vous affrontez l'ennemi : " . $ennemi->getName() . ". Il a " . $ennemi->getAge() . " ans.<br>";
            if($ennemi->getAge() >= 70){
                //chance de 50/50 : décide de tricher ou non
                $cheat = utils::random(0,1);
                // si $cheat == 1 alors je triche, sinon jouer normalement
                if($cheat == 1){
                    echo "Je triche !<br>";
                    //fonction cheat exécuter
                    echo $hero->cheat($listEnnemis, $randomEnnemis, $hero->getName(), $hero->setMarbles($hero->getWinner()), $ennemi->getMarbles(), $hero->getGain());
                    echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
                    echo "Le level " . $level ." est fini.<br>";
                    $randomEnnemis = utils::random(0,count($listEnnemis)-1);
                    $ennemi = $listEnnemis[$randomEnnemis];
                    // si gagne après avoir triché
                    if($level > 4){
                        $hero->victory($hero->getName(), $hero->getScreemWar());
                    }
                    continue;
                }
            }
            echo "L'ennemi a " . $ennemi->getMarbles() . " marbles. <br>";
            echo $hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus());
            // lorsque le joueur n'a plus de billes
            if($hero->setMarbles($hero->getWinner()) < 0){
                echo"Vous avez été tué !";
                // possibilité de rejouer , si pas déjà fais
                if($life == 0){
                    $life++;
                    // possibilité de rejouer dans une variable
                    $secondLife = utils::random(0,1);
                    // echo $secondLife;
                if($secondLife == 1){
                    // si oui recommencer depuis le début
                    $level = 1;
                    $start = 0;
                    echo "Vous avez été réssuciter ! <br>";
                } else {
                    // si pas relancer
                    // sortir de la boucle while
                    break;
                }
            } else {
                // si déjà rejouer
                // sortir de la boucle while 
                break;
            }
                }
            echo "Le level " . $level ." est fini.";
            echo "<br>";
            if($level > $matchChoose-1){
                $hero->victory($hero->getName(), $hero->getScreemWar());
            }
        }
        //niveau difficile
    } else if ( $randomLevel == 1){
        echo "Le niveau de difficulté est le niveau difficile";
        echo "<br>";
        while ($level<10){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            $randomEnnemis = utils::random(0,count($listEnnemis)-1);
            $ennemi = $listEnnemis[$randomEnnemis];
            if($start < 1){
                $start++;
                echo "Votre joueur possède " . $marblesPlayer . " marbles. <br>";
            } else {
                echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
            }
            echo "Vous affrontez l'ennemi : " . $ennemi->getName() . ". Il a " . $ennemi->getAge() . " ans.<br>";
            if($ennemi->getAge() >= 70){
                //chance de 50/50 : décide de tricher ou non
                $cheat = utils::random(0,1);
                // si $cheat == 1 alors je triche, sinon jouer normalement
                if($cheat == 1){
                    echo "Je triche !<br>";
                    //fonction cheat exécuter
                    echo $hero->cheat($listEnnemis, $randomEnnemis, $hero->getName(), $hero->setMarbles($hero->getWinner()), $ennemi->getMarbles(), $hero->getGain());
                    echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
                    echo "Le level " . $level ." est fini.<br>";
                    $randomEnnemis = utils::random(0,count($listEnnemis)-1);
                    $ennemi = $listEnnemis[$randomEnnemis];
                    if($level > 9){
                        return $hero->victory($hero->getName(), $hero->getScreemWar());
                    }
                    continue;
                }
            }
            echo "L'ennemi a " . $ennemi->getMarbles() . " marbles. <br>";
            // var_dump($ennemi);
            echo $hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus());
            if($hero->setMarbles($hero->getWinner()) < 0){
                echo"Vous avez été tué !";
                if($life == 0){
                    $life++;
                    $secondLife = utils::random(0,1);
                    // echo $secondLife;
                if($secondLife == 1){
                    $level = 1;
                    $start = 0;
                    echo "Vous avez été réssuciter ! <br>";
                } else {
                    break;
                }
            } else {
                break;
            }
                }
            echo "Le level " . $level ." est fini.";
            echo "<br>";
            if($level > 9){
                return $hero->victory($hero->getName(), $hero->getScreemWar());
            }
        //niveau impossible
    }
}else if ( $randomLevel == 2){
        echo "Le niveau de difficulté est le niveau impossible";
        echo "<br>";
        while ($level<20){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            $randomEnnemis = utils::random(0,count($listEnnemis)-1);
            $ennemi = $listEnnemis[$randomEnnemis];
            if($start < 1){
                $start++;
                echo "Votre joueur possède " . $marblesPlayer . " marbles. <br>";
            } else {
                echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
            }
            echo "Vous affrontez l'ennemi : " . $ennemi->getName() . ". Il a " . $ennemi->getAge() . " ans.<br>";
            if($ennemi->getAge() >= 70){
                //chance de 50/50 : décide de tricher ou non
                $cheat = utils::random(0,1);
                // si $cheat == 1 alors je triche, sinon jouer normalement
                if($cheat == 1){
                    echo "Je triche !<br>";
                    //fonction cheat exécuter
                    echo $hero->cheat($listEnnemis, $randomEnnemis, $hero->getName(), $hero->setMarbles($hero->getWinner()), $ennemi->getMarbles(), $hero->getGain());
                    echo "Votre joueur possède " . $hero->setMarbles($hero->getWinner()) . " marbles. <br>";
                    echo "Le level " . $level ." est fini.<br>";
                    $randomEnnemis = utils::random(0,count($listEnnemis)-1);
                    $ennemi = $listEnnemis[$randomEnnemis];
                    if($level > 19){
                        $hero->victory($hero->getName(), $hero->getScreemWar());
                    }
                    continue;
                }
            }
            echo "L'ennemi a " . $ennemi->getMarbles() . " marbles. <br>";
            // var_dump($ennemi);
            echo $hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus());
            if($hero->setMarbles($hero->getWinner()) < 0){
                echo"Vous avez été tué !";
                if($life == 0){
                    $life++;
                    $secondLife = utils::random(0,1);
                    // echo $secondLife;
                if($secondLife == 1){
                    $level = 1;
                    $start = 0;
                    echo "Vous avez été réssuciter ! <br>";
                } else {
                    break;
                }
            } else {
                break;
            }
                }
            echo "Le level " . $level ." est fini.";
            echo "<br>";
            if($level > 19){
                $hero->victory($hero->getName(), $hero->getScreemWar());
            }
    }}
?>