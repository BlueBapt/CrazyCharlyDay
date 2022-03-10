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

    public function personaliserBoite(Request $req, Response $resp, $args)
    {
        $infoCommande = unserialize($_POST["choix"]);
        $vue = new Vues\VueChoixCouleurBoite($this->container, $req);
        $vue->donnees=$infoCommande;
        $resp->getBody()->write($vue->render($infoCommande));
        return $resp;
    }

    public function finaliser(Request $req, Response $resp, $args)
    {
        $vue = new Vues\VueFinalisationBoite($this->container, $req);
        $resp->getBody()->write($vue->render());
        return $resp;
    }

    public function recap(Request $req, Response $resp, $args)
    {
        $vue = new Vues\VueRecap($this->container, $req, [1 => ["aaa", "aaa", "aaa"], 2 => ["bbb", "bbb", "bbb"]], "");
        $resp->getBody()->write($vue->render());
        return $resp;
    }
}