<?php
# src/router/Router.php
declare(strict_types=1);
namespace app\guild\router;
class  Router
{
	private mixed $_listRoute;
	// est issus du traidement par json_deco: cela contient un mixed qui contient des classes standard
	private static ?Router $_instance= null;
	private function __construct()
	{
		$stringRoute = file_get_contents('./../config/routes.json');
		$this->_listRoute = json_decode($stringRoute);
	}
	public static function getInstance()
	{
		if (self::$_instance == null)
			self::$_instance= new Router();
		return self::$_instance;
	}

	private function _buildParamsPattern(\stdClass $route):string
	{
		// le parametre $route est issu d'une route trouvée depuis le mixed généré par json_decode. chaque sous élément est un objet de la classe stdClass
		$patternParams="";
		foreach($route->params as $params)
		{
			$patternParams.='/\d';
		}
		return $patternParams;
	}

	public function findRoute(HttpRequest $httpRequest):Route
	{
		$routeFound = array_filter($this->_listRoute,function($route) use ($httpRequest){
			return preg_match("#^" . $route->path .$this->_buildParamsPattern($route)."$#", $httpRequest->getUri()) && $route->method == $httpRequest->getMethod();
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


}