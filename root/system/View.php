<?php
class View
{
    private static $Instance = null;

    public static function getInstance(){
        if(self::$Instance == null)
            self::$Instance = new View;
        return self::$Instance;
    }

    private function __construct(){

    }

    public function init(){
        }

    

    function __destruct(){
       // echo 'View is destructed!';
    }

}
