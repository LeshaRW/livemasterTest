<?php 

    namespace App\Controllers;

    use App\Controllers\Controller;
    use App\Models\Main_model;

    class Main_Controller extends Controller
    {
    	public function __construct()
    	{
    		parent::__construct();
    		$this->model = new Main_model();
    	}

    	public function action()
    	{
    		$this->view->show($this->model->getData());
    	}
    }