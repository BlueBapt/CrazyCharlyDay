<?php

namespace custumbox\models;

class Produit extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'produit';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function categorie() {
        return $this->belongsTo('custumbox\models\Categorie', 'id');
    }
}