<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use custumbox\Bd\ConnexionFactory as ConnexionFactory;
use custumbox\Vues\VueAccueil as VueAccueil;

require __DIR__ . '/vendor/autoload.php';

session_start();
/*ConnexionFactory::setConfig("conf.ini.dist");
$db = ConnexionFactory::makeConnexion();
$db->setAsGlobal();
$db->bootEloquent();*/

$configuration = ['settings' => [] ] ;
$c = new \Slim\Container($configuration);

$app = new \Slim\App;

$app->get('/', function (Request $req, Response $resp, $args) {
    $acc = new VueAccueil($this, $req);
    return $acc->render();
})->setName('accueil');

$app->run();