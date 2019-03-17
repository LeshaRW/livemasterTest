<?php

namespace app\view;

use Twig_Loader_Filesystem;
use Twig_Environment;


class View{
	public $twig;
	public function __construct()
	{
		$loader = new Twig_Loader_Filesystem('app/views');
		$this->twig = new Twig_Environment($loader);
	}
	public function show($data){
		echo $this->twig->render('view.php',['data' => $data['users'],'city' => $data['city']]);
	}
}