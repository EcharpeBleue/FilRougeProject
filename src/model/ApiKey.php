<?php
declare(strict_types=1);

namespace app\guild\model;

class ApiKey{
    private int $_id;
    private string $_apiCode;
    private Utilisateur $_utilisateur;

    public function __construct(int $id=0,string $apiCode, Utilisateur $utilisateur, ){
        $this->_utilisateur = $utilisateur;
        $this->_apiCode = $apiCode;
        $this->_id = $id;
    }

    public function getId():int {
        return $this->_id;
    }


    public function getApiCode():string {
        return $this->_apiCode;
    }


    public function getUtilisateur():Utilisateur {
        return $this->_utilisateur;
    }
}