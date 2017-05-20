<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $fillable = [ 
    
    'img', 

    'name','price', 'rent', 

    'square', 'type', 'roomNumber',

    'smallDisc', 'largDisc', 'tags',

    'lang', 'lat', 'status', 'codePostalMaroc', 

    'user_id',

    ];




    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
