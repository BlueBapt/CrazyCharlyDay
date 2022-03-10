<?php

namespace custumbox\models;

class CommandeProduit extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'commandeproduit';
    protected $primaryKey = 'idCommande';
    public $timestamps = false;


    public function produit() {
        return $this->hasMany('custumbox\models\Produit', 'id');
    }
}