<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Bd\ConnexionFactory as ConnexionFactory;

require __DIR__ . '/vendor/autoload.php';

session_start();
ConnexionFactory::setConfig("conf.ini.dist");
$db = ConnexionFactory::makeConnexion();
$db->setAsGlobal();
$db->bootEloquent();

$configuration = ['settings' => [] ] ;
$c = new \Slim\Container($configuration);

$app = new \Slim\App;

$app->get('/liste/{id}', function (Request $req, Response $resp, $args) {
    $controleur = new ControleurListe($this);
    return $controleur->getList($req, $resp, $args);
})->setName("liste");
$app->post('/liste/{id}', function (Request $req, Response $resp, $args) {
    $controleur = new ControleurListe($this);
    return $controleur->getList($req, $resp, $args);
});

$app->run();