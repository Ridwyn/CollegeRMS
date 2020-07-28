<?php
namespace CSY2028;
class EntryPoint {
	private $routes;

	public function __construct(\CSY2028\Routes $routes) {
        $this->routes = $routes;
    }

    // make to return only allow access level routes
    public function accessRoutes(array $arr,  $accesslevel){
		$accessRoutes=[];
		foreach ($arr as $key => $route) {
			if(isset($route['access']) &&$route['access'][$accesslevel]){
				$data[$key]=$route;
				$accessRoutes+=$data;
            }
            if($key=='login'){
                $data[$key]=$route;
				$accessRoutes+=$data;
            }
            if($key=='logout'){
                $data[$key]=$route;
				$accessRoutes+=$data;
            }
		}
		return $accessRoutes;
	}

	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
		$routes = $this->routes->getRoutes();
		$authentication = $this->routes->getAuth();
		$method = $_SERVER['REQUEST_METHOD'];


		if(isset($_SESSION['usertype'])){	
            if($_SESSION['usertype']=='teacher'){
                $routes=$this->accessRoutes($routes,'teacher');
            }
            if($_SESSION['usertype']=='student'){
               $routes=$this->accessRoutes($routes,'student');
            }
           	
		}
		
		// Return to login page 
		// if(!isset($routes[$route])){
		// 	$controller = $routes['login'][$method]['controller'];
		// 	$functionName = $routes['login'][$method]['function'];
		// 	$page = $controller->$functionName();
		// 	$page['variables']['error']='Unauthorised Access';
		// 	$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
		// 	$title = $page['title'];
		// 	echo $this->loadTemplate('../templates/layout.html.php', $this->routes->getVarsForLayout($title, $output));

		// }

		// 
		if($authentication->isLoggedIn() && array_key_exists($route,$routes)){
		
			$controller = $routes[$route][$method]['controller'];
			$functionName = $routes[$route][$method]['function'];
			$page = $controller->$functionName();
            $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
			$title = $page['title'];
            echo $this->loadTemplate('../templates/layout.html.php', $this->routes->getVarsForLayout($title, $output));

			
		}else{
			$controller = $routes['login'][$method]['controller'];
			$functionName = $routes['login'][$method]['function'];
			$page = $controller->$functionName();
			$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
			$title = $page['title'];
			echo $this->loadTemplate('../templates/layout.html.php', $this->routes->getVarsForLayout($title, $output));

		}
	}

	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}