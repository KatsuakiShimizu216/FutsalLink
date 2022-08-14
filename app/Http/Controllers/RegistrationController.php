<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Player;
use App\Fsvorite;
use App\User;
use App\Http\Requests\CreateTeam;
use App\Http\Requests\CreateMesse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

class RegistrationController extends Controller
{
    public function messageForm(Team $team){
        
        
        return view('message/message_form',[
            'team'=>$team,
        ]);
    }    



    public function messageConf(Team $team,CreateMesse $request){
        
        
        return view('message/confirm',[
            'team'=>$team,
            'messe'=>$request,
        ]);
    }    


    public function messageComp(Team $team,CreateMesse $request){
        $messe =new Player;

        $columns =['name','birth','possision','career','comment','email'];

        foreach($columns as $column){
            $messe->$column =$request->$column;
        }
        $messe['team_id']=$team['id'];

        Auth::user()->player()->save($messe);
        return view('message/complete');
    }    


    public function deleteMesse($player){
        $message= new Player;

        $messe=$message->where('id',$player)->delete();

        return redirect('/manage/messagelist');
    }




   


    public function teameditForm(Team $team){

        return view('manage/team_edit',[
            'team'=>$team,
        ]);

    }

    public function teamEdit(Team $team,CreateTeam $request){

        $columns=['team','email','level','place','address','title','comment'];

        foreach($columns as $column){
            $team->$column =$request->$column;
            }
            if(request('img')){
                $original=request()->file('img')->getClientOriginalName();
                $name=date('Ymd_His').'_'.$original;
                $file=request()->file('img')->move('storage/images',$name);
                $team->img=$name;
            
            }

            $team->save();

            return redirect('/team');
        }



        public function deleteTeam(Team $team){
            $team->delete();
    
            return redirect('/team');
        }
    
}
