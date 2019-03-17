<?php 
    
    namespace app\controllers;

    use app\view\View;

    class Controller
    {
    	public $view;
    	public $model;
    	public function __construct()
    	{
    		$this->view = new View();
    	}
    }