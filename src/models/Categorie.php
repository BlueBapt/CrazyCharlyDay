<?php

namespace custumbox\models;

class Categorie extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'categorie';
    protected $primaryKey = 'id';
    public $timestamps = false;


    public function produit() {
        return $this->hasMany('custumbox\models\Produit', 'id');
    }
}