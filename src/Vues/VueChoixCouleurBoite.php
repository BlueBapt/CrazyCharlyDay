<?php

namespace custumbox\Vues;

class VueChoixCouleurBoite extends Vue{

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
            <input type="color">
        HTML;
        return $html;
    }
}