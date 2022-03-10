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
    public function __construct($c, $rq, $prodListe, $boite){
        parent::__construct("", $c, $rq);
        $this->produitsListe = $prodListe;
        $this->boite = $boite;
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        // On a besoin de récupérer chaque titre de produits, la quantité et le poids
        $tableau = static::getRecap($this->produitsListe);
        $taille = $this->produitsListe[1];
        $tableauString=serialize($this->produitsListe);
        $couleur = $this->boite[0];

        $html = <<<HTML
            <h1> Récapitulatif </h1>
            <?php $tableau
            <h1><br>Boîte</h1>
            Taille de la boite : $taille <br>
            <div class="couleurBoite">Couleur de la boite : <div class="montrerCouleur"></div></div>
            
        HTML;
        $html .= <<<HTML
            <h1><br>Coordonées</h1>
            

            
            <form class="formulaire" method="post" action="finaliserboite">
                <fieldset>
                    <div class="ligne">
                        <label>Nom</label><input id="nom" name="nom" type="text" required>
                        <label>Prénom</label><input id="prenom" name="prenom" type="text" required>
                    </div>
                    <input class="cacher" name="choix" type="text" value="$tableauString"></input>
                    <div class="ligne"><label>Adresse</label><input id="adresse" name="adresse" type="text" required></div>
                    <input class="ligne" type="submit" value="Valider">
                </fieldset>
            </form>
            <style>
                body{
                    text-align: center;
                }
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
                .montrerCouleur{
                    background-color: $couleur;
                    height:1.3em;
                    width:1.3em;
                    
                }
                .couleurBoite{
                    display: flex;
                    flex-direction: row;
                }
                
                
            </style>
            HTML;
        return $html;
    }

    public static function getRecap(Array $tab) : string {
        return ConstructHTML::createTable($tab);
    }
}