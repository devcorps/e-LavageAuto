<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passage extends Model
{
    protected $fillable = [
        'facture', 'contact', 'montant', 'heureArrive', 'heureDepart', 'vehicule_id', 'lavage_id', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lavages()
    {
        return $this->belongsTo('App\Lavage');
    }

    public function vehicules()
    {
        return $this->belongsTo('App\Vehicule');
    }
}
