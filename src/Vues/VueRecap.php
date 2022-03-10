<?php

namespace custumbox\Vues;

use custumbox\Helpers\ConstructHTML as ConstructHTML;

class VueRecap extends Vue{

    private $produitsListe, $commande;

    /**
     * @param $c
     * @param $rq
     * @param $produitsListe c'est une liste de la forme ["id" -> ["poids", "quantité", "titre"]]
     * @param $boite
     */
    public function __construct($c, $rq, $produitsListe, $boite){
        parent::__construct("", $c, $rq);
        $this->produitsListe = $produitsListe;
        $this->boite = $boite;
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        // On a besoin de récupérer chaque titre de produits, la quantité et le poids
        $tableau = ConstructHTML::createTable($this->produitsListe);
        $html = <<<HTML
            <h1> Récap </h1>
            $tableau
            <h1>Coordonées</h1>
        HTML;
        return $html;
    }
}