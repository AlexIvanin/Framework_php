<?php

Class Controller{

    private static $Services = array();
	private static $api = array();
    private static $Controllers = array();
    private static $optionsArray = null;

    public function __construct(){
        $this->getService('Session');

    }

    public function getOptions($optionName){
        if (!self::$optionsArray) {
            self::$optionsArray = Spyc::YAMLLoad('root/config/options.yml');
        }

        return self::$optionsArray[$optionName];
    }

    function getService($serviceName)
    {
        if(!isset(self::$Services[$serviceName])){
            $serviceName .= 'Service';
            require_once PATH.'/root/application/Service/'.$serviceName.'.php';
            self::$Services[$serviceName] = new $serviceName;
        }
        return self::$Services[$serviceName];
    }
	function getAPI($apiName) {
	
	    if(!isset(self::$api[$apiName])){
            $apiName .= 'API';
            require_once PATH.'/root/application/API/'.$apiName.'.php';
            self::$api[$apiName] = new $apiName;
        }
        return self::$api[$apiName];
	}

    public function getController($controllerName)
    {
        if ( !isset(self::$Controllers[$controllerName]) ) {
            $controllerName .= 'Controller';
            require_once PATH.'/root/application/Controllers/'.$controllerName.'.php';
            self::$Controllers[$controllerName] = new $controllerName;
        }
        return self::$Controllers[$controllerName];
    }

    public function redirect($page)
    {
        header('location:'.$page);
        exit();
    }

    public function getUser()
    {
        return $this->getService('Security')->getUser();
    }

    public function generate($name, $params = array())
    {
        return Core::getInstance()->Router->generate($name, $params);
    }

    public function render($tplName)
    {
       // require_once PATH.'/root/tpl/'.$tplName.'.tpl';
		return $this->getService('Templates')->render($tplName);
	}

    /**
     * @return \UserRepository
     */
    public function getUserRepository()
    {
        return $this->getService('Database')->getRepository('User');
    }

    /**
     * @return \FrontRepository
     */
    public function getFrontRepository()
    {
        return $this->getService('Database')->getRepository('Front');
    }

    /**
     * @return \AjaxRepository
     */
    public function getAjaxRepository()
    {
        return $this->getService('Database')->getRepository('Ajax');
    }

}