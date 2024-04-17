<?php
# src/router/Router.php
declare(strict_types=1);
namespace app\guild\router;
	class  Router
	{
		private $_listRoute;
        private Router $_instance;
		public function __construct()
		{
			$stringRoute = file_get_contents('./../config/routes.json');
			$this->_listRoute = json_decode($stringRoute);
		}
		public function findRoute($httpRequest)
		{
            $routeFound = array_filter($this->_listRoute,function($route) use ($httpRequest){
				return preg_match("#^" . $route->path . "$#", $httpRequest->getUrl()) && $route->method == $httpRequest->getMethod();
			});
			$numberRoute = count($routeFound);
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException();
			}
			else
			{
				return new Route(array_shift($routeFound));	
			}
		}
        public static function getInstance()
        {
            if (self::$_instance ==null)
            self::$_instance= new Router();
            return self::$_instance;
        }
	}