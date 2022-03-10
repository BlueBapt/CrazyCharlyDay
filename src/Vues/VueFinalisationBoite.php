<?php

namespace custumbox\Vues;

class VueFinalisationBoite extends Vue{

    public function __construct($c, $rq){
        parent::__construct("", $c, $rq);
    }

    public function linkCss() : string{
        return "";
    }

    public function createContent() : string{
        $html = <<<HTML
            <div class="finalisation-container">
                <div class="">
                    <p class="thx-phrase">Merci d'avoir passé commande !</p>
                    <a class="btn btn-light btn-xl" href="../">Retour à l'acceuil</a>
                </div>
            </div>
        HTML;
        return $html;
    }
}