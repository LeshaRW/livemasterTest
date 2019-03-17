<?php 

    namespace app\controllers;

    use app\controllers\Controller;
    use app\models\Main_model;

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