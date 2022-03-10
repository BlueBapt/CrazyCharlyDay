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
            <h1 style="color:#47aca4; text-align: center"> Veuillez choisir la couleur de votre boite </h1>
            
            <form class="formulaire" method="post" action="recapitulatif">
                <fieldset>
                    <input id="couleur" name="couleur" class="couleur" type="color" required>
                    <img src="/assets/img/boite.png">
                    <textarea id="texte" name="texte" required maxlength="100" placeholder="Entrez votre message"></textarea>
                    <textarea id="choix" name="choix" class="cacher">
            HTML;
        $html=$html.$this->donnees;
        $html=$html.<<<HTML
                    </textarea>
                    <input type="submit" value="Valider">
                </fieldset>
                
            </form>
            <style>
                body{
                    background-color: white;
                }
                fieldset{
                    display:flex;
                    display: -webkit-flex;
                    align-items: center;
                    flex-direction: column;
                }
                form{
                    text-align: center;
                }
                .cacher{
                    display: none;
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