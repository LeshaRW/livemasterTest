<?php   
	namespace app;

    use app\controllers\Main_controller;
    use app\controllers\Ajax_controller;
    use app\view\View;

    class App
    {
        public static function run()
        {
            $pages = explode('/', substr($_SERVER['REQUEST_URI'],1));
            $controller = ucfirst($pages[0]);
            if ($controller === '')
                $controller = 'Main';
            $method = strtolower($pages[1]);
            if ($method === '')
        	    $method = 'action';
            $controller = 'app\\controllers\\'.$controller.'_controller';            
            if (class_exists($controller) && method_exists($controller, $method)) {
            	$c = new $controller();
            	$c->$method();
            }else echo '404';
        }
    }