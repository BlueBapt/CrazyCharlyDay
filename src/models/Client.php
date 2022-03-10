<?php

namespace custumbox\models;

class Client extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'client';
    protected $primaryKey = 'idClient';
    public $timestamps = false;


    public function client() {
        return $this->hasMany('custumbox\models\CLient', 'id');
    }
}