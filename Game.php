<?php
    require_once 'Heros.php'; //inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    require_once 'Ennemis.php'; //inclus le fichier Ennemis.php car on nous appris que chaque class était un fichier en entreprise
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    $randomLevel = utils::random(0,2);
    $randomHero = utils::random(0,2);
    $hero = $listHero[$randomHero];
    echo "Vous incarnez le joueur " . $hero->getName() . ".";
    echo "Votre joueur possède " . $hero->getMarbles() . " marbles";
    echo "<br>";
    // $marblesPlayer = $hero->getMarbles();
    $level = 0;
    if ($randomLevel == 0){
        echo "Le niveau de difficulté est le niveau facile.";
        echo "<br>";
        while ($level<5){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
            $randomEnnemis = utils::random(0,count($listEnnemis)-1);
            $ennemi = $listEnnemis[$randomEnnemis];
            echo "Votre joueur possède " . $hero->getMarbles() . " marbles. <br>";
            // var_dump($ennemi);
            echo "L'ennemi avait " . $ennemi->getMarbles() . " marbles. <br> Vous aviez choisi de dire :<br>" . $hero->choose($hero->getName(), $hero->getMarbles(), $ennemi->getMarbles(), $hero->getGain(), $hero->getMalus());
            $hero->setMarbles($hero->getMarbles());
            if($hero->getMarbles() == 0){
                echo"Vous avez été tué !";
                break;
                $secondLife = utils::random(0,1);
                if($secondLife == 1){
                    continue;
                    $level=0;
                    echo "Vous avez été réssuciter !";
                } 
            }
            echo "Le level " . $level ." est fini.";
            echo "<br>";
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