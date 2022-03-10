<?php

use App\Controleurs\ControleurListe;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use custumbox\Bd\ConnexionFactory as ConnexionFactory;
//vues
use custumbox\Vues\VueAccueil as VueAccueil;
//controlleurs
use custumbox\Controleurs\ControleurBoite as ControleurBoite;


require __DIR__ . '/vendor/autoload.php';

session_start();
/*ConnexionFactory::setConfig("conf.ini.dist");
$db = ConnexionFactory::makeConnexion();
$db->setAsGlobal();
$db->bootEloquent();*/

$configuration = [
    'settings' => [
    'displayErrorDetails' => true,],
    'imgPath' => 'img/',
];

$c = new \Slim\Container($configuration);

$app = new \Slim\App;

$app->get(
    '/',
    function (Request $req, Response $resp, $args) {
        $acc = new VueAccueil($this, $req);
        return $acc->render();
    }
);

$app->get(
    '/creerboite',
    function (Request $req, Response $resp, $args) {
        $c = new ControleurBoite($this, $req);
        return $c->createBox($req, $resp, $args);
    }
)->setName('creerboite');

$app->post(
    '/creerboite',
    function (Request $req, Response $resp, $args) {
        //
    }
);

$app->get(
    '/recapitulatif',
    function (Request $req, Response $resp, $args) {
        $c = new ControleurBoite($this, $req);
        return $c->recap($req, $resp, $args);
    }
)->setName('recapitulatif');

$app->post(
    '/recapitulatif',
    function (Request $req, Response $resp, $args) {
        //
    }
);

$app->get(
    '/finaliserboite',
    function (Request $req, Response $resp, $args) {
        $c = new ControleurBoite($this, $req);
        return $c->finaliser($req, $resp, $args);
    }
)->setName('finaliserboite');

$app->post(
    '/finaliserboite',
    function (Request $req, Response $resp, $args) {
        //
    }
);



//fin de route

$app->run();