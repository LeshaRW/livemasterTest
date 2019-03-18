<?php

    namespace App\Models;

    use App\BD;
    
    class Main_model
    {
    	public function getData()
    	{
	    	$data = [];
			$data['city'] = [];
			$data['error'] = [];
			$bd = BD::getConnect();
			if ($bd !== false){
				$sql = 'SELECT `name`,`age`, (SELECT `name` FROM `city` WHERE `id` = users.`city`) AS `city` FROM `users`';
				$stmt = $bd->query($sql);
				$data['users'] = $stmt->fetchAll();
				$sql = 'SELECT `id` , `name` FROM `city`';
				$stmt = $bd->query($sql);
				$data['city'] = $stmt->fetchAll();
			}else $data['error'] = 'ошибка соединения с бд';
			return $data;
    	}

    }