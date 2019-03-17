<?php

namespace app;
use PDO;

class BD 
{
	public static function getConnect(){
		$option = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    	];
    	$localhost = '127.0.0.1';
	    $bd   = 'test';
	    $user = 'root';
	    $password = '';
	    $char = 'utf8';
	    $dsn = "mysql:host=$localhost;dbname=$bd;charset=$char";

	    return new PDO($dsn,$user,$password,$option);
	}

}