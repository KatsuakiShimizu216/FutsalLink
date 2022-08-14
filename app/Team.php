<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Favorite;

class Team extends Model
{
    protected $fillable =['team','email','level','place','address','title','comment'];
   
    public function user(){
        return $this->belongsToMany('App\User');
    }

   

    public function favorite(){
        return $this->hasMany('App\Favorite');
    }
    
    public function isFavoriteBy($user):bool{
        if($user==null){return true;}else{
        return Favorite::where('user_id',$user->id)->where('team_id',$this->id)->first()!==null;}
        
    }
   
    public function getFavoriteCount():int{

        return Favorite::where('team_id',$this->id)->count();  
    } 
}
