<?php   
	namespace App;

    use App\Controllers\Main_controller;
    use App\Controllers\Ajax_controller;
    use App\View\View;

    class App
    {
        public static function run()
        {
            $pages = explode('/', substr($_SERVER['REQUEST_URI'],1));
            $controller = ucfirst($pages[0]);
            if ($controller === '')
                $controller = 'Main';
            $method = @strtolower($pages[1]);
            if ($method === '')
        	    $method = 'action';
            $controller = 'App\\Controllers\\'.$controller.'_controller';            
            if (class_exists($controller) && method_exists($controller, $method)) {
            	$c = new $controller();
            	$c->$method();
            }else echo '404';
        }
    }