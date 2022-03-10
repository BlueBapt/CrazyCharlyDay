<?php

namespace custumbox\models;

class Commande extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'commande';
    protected $primaryKey = 'idCommande';
    public $timestamps = false;


    public function produit() {
        return $this->hasMany('custumbox\models\Produit', 'id');
    }
}