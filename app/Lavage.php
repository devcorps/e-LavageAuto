<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lavage extends Model
{
    protected $fillable = [
        'libelle', 'categorie', 'tarif', 'user_id',
    ];

    public  function passages()
    {
        return $this->hasMany('App\Passage', 'lavage_id');
    }
}
