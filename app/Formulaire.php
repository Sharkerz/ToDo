<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    protected $fillable = [
        'email', 'texte', 
    ];
}
