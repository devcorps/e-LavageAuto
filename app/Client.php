<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'telphone', 'nom', 'prenoms', 'commune', 'permis', 'user_id',
    ];

    public  function vehicules()
    {
        return $this->hasMany('App\Vehicule', 'client_id');
    }
}
