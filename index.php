<?php

//$start_memory_usage = memory_get_usage();
//$start_time = microtime(true);


require 'root/application/autoload.php';

Core::getInstance()->init();

Core::getInstance()->Routing();
Core::getInstance()->Display();

//$end_time = microtime(true);
//$end_memory_usage = memory_get_usage();


//$time = round(($end_time-$start_time),5);
//$memory = ($total_memory_usage = $end_memory_usage - $start_memory_usage) / 1024 / 1024;
//echo "<div id='debug'>time: ".$time."     memory: ".$memory."</div><style>#debug{color:white;}</style>";
