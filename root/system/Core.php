<?php

class Core
{
    protected static  $Instance = null;
    protected $user = null;
    private $output = null;
    public $Router = null;


    public static function getInstance(){
        if(self::$Instance == null)
            self::$Instance = new Core;
        return self::$Instance;
    }

    private function __construct(){}

    public function Routing()
    {
        $urlMap = Spyc::YAMLLoad('root/config/routing.yml');

        $url = $_SERVER['REQUEST_URI'];
        if (substr($url, strlen($url)-1, 1) != '/') {
            $url .= '/';
        }

        $this->Router = new Router();

        foreach($urlMap as $key=>$value){
            if (isset($value['method'])) {
                $method = $value['method'];
            } else {
                $method = 'GET';
            }
            if (!empty($value['path'])) {
                $path = $value['path'];
            }
            if (!empty($value['action'])) {
                $action = $value['action'];
            }
            if (!empty($path) && ($action)) {
                $this->Router->map($method ,$path, $action, $key);
            }
        }
        $match = $this->Router->match($url);
        if ($match) {
		$Ar = explode(':',$match['target']);
        $Ar[0] .= 'Controller';
        require_once $_SERVER['DOCUMENT_ROOT'].'/root/application/Controllers/'.$Ar[0].'.php';
        $Class = new $Ar[0];
        ob_start();

        if ($match['params']) {
            $this->output = $Class->$Ar[1]($match['params']);
        } else {
            $this->output = $Class->$Ar[1]();
        }
		
		 }
				   else {
           require_once $_SERVER['DOCUMENT_ROOT'].'/root/tpl/page_not_found.tpl';
        }
    }

    public function init()
    {
        session_start();
        
    }

    public function Display()
    {
        echo $this->output;
    }

    function __destruct()
    {
        //echo 'Core is destructed';
    }

}
