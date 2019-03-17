<?php 

namespace app\controllers;

use app\BD;
use app\controllers\Controller;
use app\models\Ajax_model;


class Ajax_controller extends Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->model = new Ajax_model();
	}
	function addUser()
	{
		$this->model->addUser();
	}
	function addCity()
	{
		$this->model->addCity();
	}
}