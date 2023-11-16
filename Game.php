<?php
    require_once 'Heros.php'; //inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    require_once 'Ennemis.php'; //inclus le fichier Ennemis.php car on nous appris que chaque class était un fichier en entreprise
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include


    // nombre aléatoire qui va définir le niveau de difficulté
    $randomLevel = utils::random(0,2);
    // sélection d'un héros aléatoire grâce à un chiffre aléatoire
    $randomHero = utils::random(0,2);
    // sélection du héro aléatoire
    $hero = $listHero[$randomHero];
    // echo du héro aléatoire / personnage du joueur + nombre de bille du joueur
    echo "Vous incarnez le joueur " . $hero->getName() . ".";
    echo "Votre joueur possède " . $hero->getMarbles() . " marbles";
    echo "<br>";
    // $marblesPlayer = $hero->getMarbles();
    // sert à monter de niveau
    $level = 0;
    // sert à l'option relancé
    $life = 0;
    // 
    $start = 0;
    $marblesPlayer = $hero->getMarbles();
    if ($randomLevel == 0){
        echo "Le niveau de difficulté est le niveau facile.";
        echo "<br>";
        while ($level<5){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            $randomEnnemis = utils::random(0,count($listEnnemis)-1);
            $ennemi = $listEnnemis[$randomEnnemis];
            if($start < 1){
                $start++;
                echo "Votre joueur possède " . $marblesPlayer . " marbles. <br>";
            } else {
                echo "Votre joueur possède " . $hero->setMarbles($hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus())) . " marbles. <br>";
            }
            echo "Vous affrontez l'ennemi : " . $ennemi->getName() . ". <br>";
            if($ennemi->getAge() >= 70){
                $hero->cheat($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain());
            }
            echo "L'ennemi a " . $ennemi->getMarbles() . " marbles. <br>";
            // var_dump($ennemi);
            echo $hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus());
            $hero->setMarbles($hero->choose($listEnnemis, $randomEnnemis, $hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus()));
            if($hero->getMarbles() == 0){
                echo"Vous avez été tué !";
                if($life < 0){
                    $life++;
                    $secondLife = utils::random(0,1);
                if($secondLife == 1){
                    continue;
                    $level=0;
                    echo "Vous avez été réssuciter !";
                } 
                break;
            }
                }
            echo "Le level " . $level ." est fini.";
            echo "<br>";
            if($level > 4){
                $hero->victory($hero->getName(), $hero->getScreemWar());
            }
        }
    } else if ( $randomLevel == 1){
        echo "Le niveau de difficulté est le niveau difficile";
        echo "<br>";
        while ($level<10){//niveau difficile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            echo "Le level " . $level ." est fini.";
            echo "<br>";
        }
    } else if ( $randomLevel == 2){
        echo "Le niveau de difficulté est le niveau impossible";
        echo "<br>";
        while ($level<20){// niveau impossible
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            echo "Le niveau " . $level ." est fini.";
            echo "<br>";
        }
    }
?>