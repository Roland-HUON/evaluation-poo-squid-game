<?php
    require_once 'Heros.php'; //inclus le fichier Heros.php car on nous appris que chaque class était un fichier en entreprise
    require_once 'Ennemis.php'; //inclus le fichier Ennemis.php car on nous appris que chaque class était un fichier en entreprise
    require_once 'utils.php';//inclus le fichier utils.php car on nous appris que chaque class était un fichier en entreprise
    // de plus, j'en ai absolument besoin pour que le reste marche donc requiere et include
    class game{
        
    }
    $randomLevel = rand(0,2);
    $level = 0;
    echo $randomLevel;
    $nomPersonnage =array("Seong Gi-hun", "Kang Sae-byeok", "Cho Sang-woo");
    $marblesStart= array(15,25,35);
    $malusPersonnage=array(2,1,0);
    $bonusPersonnage=array(1,2,3);
    $playerNumber = 0;
    foreach ($nomPersonnage as $player){
        $player.$playerNumber = new Heros($nomPersonnage[$playerNumber],$marblesStart[$playerNumber], $malusPersonnage[$playerNumber], $bonusPersonnage[$playerNumber]);
        $listPlayer = array($player.$playerNumber);
        $playerNumber++;
    }
    echo $listPlayer;
    $nomEnnemis = array(
        "Victor", "Steve", "Louis", "Silvain", "Luc",
        "Antoine", "Marc", "Julius", "Henry", "Franck",
        "Bruno", "Jeremy", "Pierre", "Antoine", "Léo",
        "Kleine", "Larry","Jean","Jack","Julius", 
    );
    $marblesEnnemi = rand(1,20);
    $ageEnnemi = rand(18, 100);
    foreach($nomEnnemis as $ennemis){
        $ennemis = new Ennemis($ennemis, $marblesEnnemi, $ageEnnemi);
        $listEnnemis = array($ennemis);
    }
    $lenghtListEnnemis = count($listEnnemis);
    if ($randomLevel == 0){
        echo "Le niveau de difficulté est le niveau facile.";
        echo "<br>";
        while ($level<5){// niveau facile
            $level++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
            echo " Niveau : " . $level;
            echo "<br>";
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