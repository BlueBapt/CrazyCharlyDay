<?php

namespace custumbox\Vues;

class VuePersonalisationBoite extends Vue{

    public $donnees;

    public function __construct($c, $rq){
        parent::__construct("", $c, $rq);
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        $html = <<<HTML
            <h1> Veuillez choisir la couleur de votre boite </h1>
            
            <form class="formulaire" method="post" action="recap">
                <fieldset>
                    <input id="couleur" class="couleur" type="color">
                    <img src="https://img.myloview.fr/papiers-peints/boite-de-papier-vecteur-de-dessin-anime-et-illustration-noir-et-blanc-dessines-a-la-main-style-de-croquis-isole-sur-fond-blanc-400-111169455.jpg">
                    <textarea id="texte"></textarea>
                    <input type="submit" value="Valider">
                </fieldset>
                
            </form>
            <style>
                fieldset{
                    display:flex;
                    display: -webkit-flex;
                    align-items: center;
                    flex-direction: column;
                }
                form{
                    text-align: center;
                }
                .couleur{
                    width:70%;
                    height:5em;
                }
                
                
            </style>
        HTML;
        return $html;
    }
}