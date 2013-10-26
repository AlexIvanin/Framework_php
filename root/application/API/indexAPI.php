<?php

class indexAPI
{
    function __construct(){

    }
	
	public function me($ar) {
	 
//$json = '{"echo": ' . $ar['query'] . ' } ';
$json = array("apiname" => $ar['apiname'], "method" => $ar['method'],"query" => $ar['query']);
$list_text_JSON = json_encode($json);
echo $list_text_JSON ;
 
 
 }
	
	}
	
	