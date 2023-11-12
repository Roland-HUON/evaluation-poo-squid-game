<?php
    class Heros extends characters{
        public function loss(){

        }
        public function gain(){

        }
        public function cheat(){

        }
        public function choose(){ // fonction du pair ou impair en public parce qu'on veut savoir le choix du joueur
            $this->compareMarbles();
        }
        private function compareMarbles(){ // fonction privée car les autres n'ont pas à savoir ça (intérieur de la télécommande)
            
        }
        public function screem_war(){ // fonction public, on veut avoir un cri de guerre si on gagne

        }
    }
?>