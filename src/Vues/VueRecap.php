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
        //$tableau = static::getRecap($this->produitsListe);

        $html = <<<HTML
            <h1> Récap </h1>
            
            <h1>Boite</h1>
            Taille de la boite : 
            
        HTML;
        $html .= <<<HTML
            <h1>Coordonées</h1>
            

            
            <form class="formulaire" method="post" action="finaliserboite">
                <fieldset>
                    <div class="ligne">
                        <label>Nom</label><input id="nom" type="text" required>
                        <label>Prenom</label><input id="prenom" type="text" required>
                    </div>
                    <div class="ligne"><label>Adresse</label><input id="adresse" type="text" required></div>
                    <input class="ligne" type="submit" value="Valider">
                </fieldset>
            </form>
            <style>
                fieldset{
                    display:flex;
                    display: -webkit-flex;
                    align-items: center;
                    flex-direction: column;
                }
                .ligne{
                    margin-bottom: 1em;
                    width:70%;
                }
                form{
                    text-align: center;
                }
                label{
                    margin-right: 1em;
                    margin-left: 0.5em;
                }
                .cacher{
                    display: none;
                }
                
                
            </style>
            HTML;
        return $html;
    }

    public static function getRecap($tab) : string {
        return ConstructHTML::createTable($tab);
    }
}