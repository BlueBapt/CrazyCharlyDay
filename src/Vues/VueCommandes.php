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
        $res = "<table>";
        $res .= "<tbody>";
        foreach($this->commandes as $row){
            $res .= "<tr>";
            $res .= "<td> $row->idCommande </td>";
            //CommandeProduit
            $res .= "</tr>";
        }

        $res .= "</tbody>";
        $res .= "</table>";
        $html = <<<HTML
            
        HTML;

        return $html;
    }

    public function notFound(): string
    {
        return "<h1> Item non trouvé </h1>";
    }

}