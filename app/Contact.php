<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //


    protected $fillable = [

    	'name', 'email', 'phoneNumber', 'subject', 'message', 'view', 'type', 'reply', 'deleted'

    ];



    public function reply()
    {
        return $this->hasOne('App\Reply', 'useID');
    }

}
