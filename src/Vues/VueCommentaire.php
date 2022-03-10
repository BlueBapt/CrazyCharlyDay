<?php


namespace custumbox\Vues;

use custumbox\Vues\VueRecap as VueRecap;

class VueCommentaire extends Vue
{
    private $produitsList;

    public function __construct($c, $rq, $produitsList)
    {
        parent::__construct("", $c, $rq);
        $this->produitsList = $produitsList;
    }

    public function linkCss(): string
    {
        return "";
    }

    public function createContent(): string
    {
        $tableau = VueRecap::getRecap($this->produitsList);
        $html = <<<HTML
            <h1> Récap </h1>
            $tableau
            <form action="POST">
                <textarea name="" id="" cols="30" rows="10" placeholder="Entrez un commentaire"></textarea>
                <button type="submit">Envoyer</button>
            </form>
        HTML;
        return $html;
    }

    public function notFound(): string
    {
        return "<h1> Item non trouvé </h1>";
    }

}