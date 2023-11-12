<?php
    class game{
        
    }
    $randomLevel = rand(0,2);
    $i = 0;
    echo $randomLevel;
    if ($randomLevel == 0){
        echo "Le niveau de difficulté est le niveau facile";
        while ($i<5){// niveau facile
            $i++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
        }
    } else if ( $randomLevel == 1){
        echo "Le niveau de difficulté est le niveau difficile";
        while ($i<10){//niveau difficile
            $i++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
        }
    } else if ( $randomLevel == 2){
        echo "Le niveau de difficulté est le niveau impossible";
        while ($i<20){// niveau impossible
            $i++;// incrémente pour sortir de la boule while, représente le niveau actuel où se trouve le joueur
        }
    }
?>