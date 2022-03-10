<?php

namespace custumbox\models;

class Client extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'client';
    protected $primaryKey = 'idCommande';
    public $timestamps = false;


    public function produit() {
        return $this->hasMany('custumbox\models\Produit', 'id');
    }
}