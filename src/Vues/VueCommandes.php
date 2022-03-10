<?php


namespace custumbox\Vues;

use custumbox\Vues\VueRecap as VueRecap;

class VueCommandes extends Vue
{
    private $commandes;

    public function __construct($c, $rq, $commandes)
    {
        parent::__construct("", $c, $rq);
        $this->commandes = $commandes;
    }

    public function linkCss(): string
    {
        return "";
    }

    public function createContent(): string
    {
        $tableau = VueRecap::getRecap($this->commandes);
        $html = <<<HTML
            $tableau
        HTML;
        return $html;
    }

    public function notFound(): string
    {
        return "<h1> Item non trouvé </h1>";
    }

}