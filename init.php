<?php
spl_autoload_register(function($className){
	$newClass = str_replace('\\', '/', $className);
	require $newClass . '.php';
});