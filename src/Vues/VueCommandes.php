<?php


namespace custumbox\Vues;

use custumbox\Vues\VueRecap as VueRecap;
use custombox\model\Commande as Commande;

class VueCommandes extends Vue
{

    public function __construct($c, $rq, $commandes)
    {
        echo "constructeur";
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
        echo "avant premier select";
        $this->commandes=Commande::select("*")->get();
        echo "apres premier select";
        foreach($this->commandes as $row){
            $res .= "<tr>";
            echo "apres premier select";
            $prods=CommandeProduit::select("idProduit","quantite","idCommande")->where("idCommande","=","$row->idCommande")->get();
            echo "apres second select";
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