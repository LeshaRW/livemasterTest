<?php
 spl_autoload_register(function($name)
 {
 	$name = str_replace('\\', '/', ucfirst($name).'.php');
 	if (file_exists($name))
 		require_once $name;
 	//else echo 'Не найден класс: '.$name;
 });
 spl_autoload_register(function($name)
 {
 	$name = str_replace('_', '/', $name.'.php');
 	if (file_exists('App/'.$name)){
 		require_once 'App/'.$name;
 	}//else echo 'Не найден класс: App/'.$name;

 });