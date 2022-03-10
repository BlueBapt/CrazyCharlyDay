<?php


namespace custumbox\Controleurs;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use custumbox\Vues as Vues;


class ControleurBoite {

    private $container;

    public function __construct($c) {
        $this->container = $c;
    }

    /**
     * Methode permettant d'afficher la création d'une boite
     */
    public function createBox(Request $req, Response $resp, $args)
    {
        // Rendu
        $vue = new Vues\VueCreationBoite($this->container, $req);
        $resp->getBody()->write($vue->render());
        return $resp;
    }

    public function recapBox(Request $req, Response $resp, $args)
    {
        // Rendu
        $vue = new Vues\VueRecapBoite($this->container, $req);
        $resp->getBody()->write($vue->render());
        return $resp;
    }
}