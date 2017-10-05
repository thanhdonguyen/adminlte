<?php
 	$cmd = "php artisan make:model abc";
    //echo $cmd;
    exec($cmd . " > /dev/null &");
?>
