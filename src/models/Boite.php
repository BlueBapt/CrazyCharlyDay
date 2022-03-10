<?php

namespace custumbox\models;

class Boite extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'boite';
    protected $primaryKey = 'id';
    public $timestamps = false;

    /**
    public function item() {
        return $this->belongsTo('mywishlist\model\Item', 'liste_id');
    }*/
}