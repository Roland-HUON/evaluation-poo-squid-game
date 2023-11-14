<?php
    class random{
        private static $random;

        public function __construct($min, $max){
            self::$random;
        }

        public static function getCount($min, $max){
            return self::$random  = rand($min,$max);
        }
    }
    echo getCount(1,2);
?>