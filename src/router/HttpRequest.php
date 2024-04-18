<?php
# src/router/HttpRequest.php
declare(strict_types=1);
namespace app\guild\router;
    class HttpRequest
    {
        private string $_uri;
        private string $_method;
        private ?array $_params; // les parametres ne sont pas defini à la création de la requête. C'est le routeur qui les ajoutera lors du traitement de la route via bindParams.
        private ?Route $_route; // route trouvée par le routeur et associée à la requete.
        
        public function __construct()
        {
            $this->_uri =$_SERVER['REQUEST_URI'];
            $this->_method = $_SERVER['REQUEST_METHOD'];
            $this->_params = null;
            $this->_route = null;
        }
        
        public function getUri():string
        {
            return $this->_uri; 
        }
        
        public function getMethod():string
        {
            return $this->_method;  
        }
        
        public function getParams():array
        {
            return $this->_params;  
        }
        public function setRoute(Route $route)
        {
            $this->_route = $route; 
        
        }
        public function getRoute():Route
        {
            return $this->_route;   
        } 
        private function bindParamFromPost():array
        {
            $params = array();
            foreach($this->_route->getParams() as $param)
                    {
                        if(isset($_POST[$param]))
                            {
                                $params[] = $_POST[$param];
                            }
                    }
            return $params;
        }
        //path :/api/quiz | params:[0=>'id'] (provient du fichier routes.json)
         // uri: "/api/quiz/5" (url demandé par le client)
       // preg_mach: "#^/api/quiz/\d$#" (expression réguliere construite pour reconnaitre la route)
        //$route: [0=>"",1=>"api",2=>"quiz"] (explode $this->_route->getPath())
       // $url: [0=>"",1=>"api",2=>"quiz",3=>5] (explode $this->_uri))
        private function bindParamFromGet():array
        {
            $route=explode('/',$this->_route->getPath());// la route ne contient pas les parametres
            $uri = explode('/',$this->_uri);
            $nbParams=count($uri)-count($route);
            $valeursParams = array_slice($uri,count($route),$nbParams);// l'url contient les parametres
            $params = array();
            for ($i =0;$i<$nbParams;$i++)
            {
                if ($this->getRoute()->getParams()[$i]->type== "integer")
                    $params[$this->getRoute()->getParams()[$i]->name] =(int) $valeursParams[$i];   
                else
                $params[$this->getRoute()->getParams()[$i]->name] = $valeursParams[$i];   
           
            }

            return $params;
        }
        public function bindParam():void
        {
            switch($this->_method)
            {
                case "GET":
                    $this->_params=$this->bindParamFromGet();
                    break;
                case "POST":
                    $this->_params=$this->bindParamFromPost();
                    break;
                // case "PUT":
                //     $this->_params=$this->bindParamFromPut();
                // break;
                // case "DELETE":
                //     $this->_params=$this->bindParamFromDelete();
                    // break;  
            }
        }
        public function run()
        {
            if ($this->_route == null)
                throw new RouteNotSetException($this);
            $this->_route->run($this);
        }

       
    }