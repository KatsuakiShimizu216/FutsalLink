<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name','birth','team_id', 'comment','career','email', 'possision'];

    public function team(){
        return $this->belongsTo('App\Team','team_id','id');
    }
    

}
