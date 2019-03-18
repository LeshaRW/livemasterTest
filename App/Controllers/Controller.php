<?php 
    
    namespace App\Controllers;

    use App\View\View;

    class Controller
    {
    	public $view;
    	public $model;
    	public function __construct()
    	{
    		$this->view = new View();
    	}
    }