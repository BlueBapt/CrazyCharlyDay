<?php


namespace custumbox\Controleurs;

use custumbox\models\Commande;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use custumbox\Vues as Vues;

use custumbox\models\Client as Client;
use custumbox\models\Boite as Boite;


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
        $vue = new Vues\VueCreationBoite($this->container, $req,$args);
        $resp->getBody()->write($vue->render());
        return $resp;
    }



    public function personaliserBoite(Request $req, Response $resp, $args)
    {
        if(!isset($_POST["choix"])){
            $infoCommande=serialize([1 => "petit" ,2 => ["objet1", "qty1"], 3 => ["objet2", "qty2"]]);
        }else {
            $infoCommande = $_POST["choix"];
        }
        $vue = new Vues\VuePersonalisationBoite($this->container, $req);
        $vue->donnees=$infoCommande;
        $resp->getBody()->write($vue->render());
        return $resp;
    }

    public function finaliser(Request $req, Response $resp, $args)
    {
        $vue = new Vues\VueFinalisationBoite($this->container, $req);
        $resp->getBody()->write($vue->render());

        if(isset($_POST["prenom"]) && isset($_POST["nom"]) && isset($_POST["adresse"])){
            
            //enregistrer le client

            echo "uwu";
            
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $adresse = $_POST["adresse"];
            $client = new Client();
            $client->nom = $nom;
            $client->prenom = $prenom;
            $client->adresse = $adresse;
            $client->save();

            //enregistrer la boite

            $b = $_POST["choix"];
            $taille = $b[0];
            $id = Boite::select("*")->where("taille","=",$taille)->get()->first()->id;

            //enregistrer la commande

            $commande = new Commande();
            $commande->idClient = $client->id;
            $commande->idBoite = $id;
            $commande->couleurCommande = $_POST["couleur"];
            $commande->save();

        }

        return $resp;
    }

    public function commenterBoite(Request $req, Response $resp, $args){
        $commande = Commande::where('token', '=', $args["token"])->first();
        echo "----" . $commande["couleurCommande"];
        $vue = new Vues\VueCommentaire($this->container, $req, [1 => ["aaa", "aaa", "aaa"], 2 => ["bbb", "bbb", "bbb"]]);
        $resp->getBody()->write($vue->render());
        return $resp;
    }

    public function recap(Request $req, Response $resp, $args)
    {
        if(isset($_POST["choix"]) && isset($_POST["couleur"]) && isset($_POST["texte"])){
            $tab = unserialize($_POST["choix"]);
            $boite = [$_POST["couleur"],$_POST["texte"]];
        }else{
            $tab=[1 => "petit" ,2 => ["objet1", "qty1"], 3 => ["objet2", "qty2"]];
            $boite = ["#998844","bojour"];
        }
        //$tab=[1 => "petit" ,2 => ["objet1", "qty1"], 3 => ["objet2", "qty2"]];

        $vue = new Vues\VueRecap($this->container, $req, $tab, $boite);

        $resp->getBody()->write($vue->render());
        return $resp;
    }

    public function afficherCommandes(Request $req, Response $resp, $args)
    {

    }


    public function recupererCategories(){

    }
}