<?php 

namespace App\controllers;

use App\BD;
use App\Controllers\Controller;
use App\Models\Ajax_model;


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