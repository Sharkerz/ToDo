<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function todolist()
    {
        return $this->belongsTo('App\Tasks');
    }

    protected $fillable = [
        'name', 'todolist_id','content','finish' 
    ];

}
