<?php

declare(strict_types=1);

namespace app\guild\controller;

class BaseApiController {
    
    protected $_httpRequest;
    protected $_param;
    
    public function __construct($httpRequest) {
        $this->_httpRequest = $httpRequest;
    }
    
    protected function view($data, $param) {
        echo "view";
    }
}
