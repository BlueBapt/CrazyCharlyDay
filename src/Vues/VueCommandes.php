<?php


namespace custumbox\Vues;

use custumbox\Vues\VueRecap as VueRecap;

class VueCommandes extends Vue
{
    private $commandes;

    public function __construct($c, $rq, $commandes)
    {
        parent::__construct("", $c, $rq);
    }

    public function linkCss(): string
    {
        return "";
    }

    public function createContent(): string
    {
        $res = "<table>";
        $res .= "<tbody>";
        $this->commandes=Commande::select("*")->get();
        foreach($this->commandes as $row){
            $res .= "<tr>";
            $prods=CommandeProduit::select("idProduit","quantite","idCommande")->where("idCommande","=","$row->idCommande")->get();
            foreach ($prods as $p){
                $res .= "<td> $row->idCommande </td>";
                $res .= "<td> $p->idProduit </td>";
                $res .= "<td> $p->quantite </td>";
            }
            $res .= "</tr>";
        }

        $res .= "</tbody>";
        $res .= "</table>";
        $html = $res;

        return $html;
    }

    public function notFound(): string
    {
        return "<h1> Item non trouvé </h1>";
    }

}