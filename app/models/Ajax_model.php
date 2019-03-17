<?php 

namespace app\models;

use app\BD;

class Ajax_model
{
	public function addUser()
	{
		$name = htmlspecialchars(trim($_POST['user']));
		$age = htmlspecialchars(trim($_POST['age']));
		$city = $_POST['city'];

		$bd = BD::getConnect();

		$data = []; 
		$data['error_name'] = false;
		$data['error_city'] = false;
		$data['error_age'] = false;
		$data['success_user'] = false;

		if ($bd){
			$sql = 'SELECT `id` FROM `city` WHERE `id` =?';
			$stmt = $bd->prepare($sql);
			if ($stmt->execute(array($city))) {
				$result = $stmt->fetch();
				if (empty($result['id']) || $result['id'] != $city)
					$data['error_city'] = 'Города нет';				
			}else $data['error_city'] = 'Города нет';
			if (empty($name) || $name == '') {
				$data['error_name'] = 'Имя не должно быть пустым';
			}
			if (!is_numeric($age) || $age > 100 || $age < 10) {
				$data['error_age'] = 'Возраст должен быть числом от 10 до 100';
			}

			if (!$data['error_name'] && !$data['error_city'] && !$data['error_age']) {
				$sql = 'INSERT INTO `users` (`name` , `age`, `city`) VALUES(?,?,?);';
				$stmt = $bd->prepare($sql);
				if ($stmt->execute(array($name,$age,$city))){
					$data['success_user'] = true;
				}
			}
			echo json_encode($data);
			
		}
	}
	public function addCity()
	{
		$name = htmlspecialchars(trim($_POST['city']));
		$data = [];
		$data['success_city'] = false;
		$data['error_name'] = false;
		if ($name != ''){
			$bd = BD::getConnect();
			$sql = 'INSERT INTO `city` (`name`) VALUES(?)';
			$stmt = $bd->prepare($sql);
			if ($stmt->execute(array($name))){
				$data['success_city'] = true;
			}
		}else $data['error_name'] = 'Название города не может быть пустым';
		echo json_encode($data);
	}
}