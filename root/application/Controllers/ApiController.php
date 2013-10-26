<?php


class ApiController extends Controller
{
 
 
 public function API($ar) {

if ($ar['apiname'] == 'index') { 
       
//$api = $this->getAPI('index')->$ar['method']($ar);

}
elseif ($ar['apiname'] == 'user') {

//$api = $this->getAPI('user')->index($ar);

}
			else {
			
			$json = array("apiname" => "error", "method" => "error" ,"query" => "error");
$list_text_JSON = json_encode($json);
echo $list_text_JSON ;
			
			
			}
			
			
			
			
			
			
			
			}
			
			}
 
 
 