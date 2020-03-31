<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sharedtodolist extends Model
{
    protected $casts = [
        'shared_user' => 'array'
    ];
    protected $fillable = [
        'id', 'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function todolist()
    {
        return $this->belongsTo('App\Todolist', 'todolist_id','id');
    }
}
