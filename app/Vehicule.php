<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    protected $fillable = [
        'immatriculation', 'marque', 'model','categorie', 'nombrePassage', 'client_id', 'user_id',
    ];

    public  function passages()
    {
        return $this->hasMany('App\Passage', 'vehicule_id');
    }

    public  function clients()
    {
        return $this->belongsTo('App\Client','id');
    }
}
