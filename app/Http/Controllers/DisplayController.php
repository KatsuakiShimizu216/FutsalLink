<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;

use App\Team;
use App\Player;
use App\Favorite;
use App\User;


class DisplayController extends Controller
{
    public function index(){
        $team = New Team;
        $teams =$team->all()->toArray();
        
        // dd($search);
        return view('top',[
            'teams'=>$teams,
            
        ]);
    }

    public function search(Request $request){
        $team =new Team;
        $search=$request->get('search');
        // dd($search);
        $teams=$team->where('title','LIKE','%'.$search.'%')->orWhere('team','LIKE','%'.$search.'%')->orWhere('level','LIKE','%'.$search.'%')->orWhere('address','LIKE','%'.$search.'%')->orWhere('place','LIKE','%'.$search.'%')->orWhere('comment','LIKE','%'.$search.'%')->get()->toArray();

        return view('top',[
            'teams'=>$teams,
            'search'=>$search,
        ]);
    }

    public function Favorite(){
        $user=Auth::user()->id;

        $teams =Team::select('teams.id','team','title','img')->join('favorites','teams.id','=','favorites.team_id')->where('favorites.user_id',$user)->get()->toArray();
        
        // dd($teams);

        return view('favorite',[
            'teams'=>$teams,
        ]);

    }


   
    public function messeList(){
        $team=Auth::user()->team()->get()->toArray(); //user to team
        
        if(empty($team)){$id=0;}else{$id=$team[0]['user_id'];}
        
        $message=new Player;

        $messe=Player::select('players.id','name','team','players.created_at')->join('teams','teams.id','=','players.team_id')->
                where('teams.user_id', $id)->get();
             
        // dd($messe);
        

        return view('manage/message_list',[
            'messages'=>$messe,
            
        ]);

    }


    public function messeDetail($player){
        $user=Auth::user()->id;

        
        $message= new Player;

        $messe=$message->where('id',$player)->get()->toArray();
        $id=$messe[0]['team_id'];
        
        $teams=new Team;
        $team=$teams->where('id',$id)->get()->toArray();
        
        if($user===$team[0]['user_id']){
        
            return view('manage/message_detail',[
                'messe'=>$messe,
                'team'=>$team,
            ]);
        }else{
            abort(403);
        }


    }

   



    public function like(Request $request)
    {
        // セッション入れる前
        
        $user_id = Auth::user()->id; //1.ログインユーザーのid取得
        $team_id = $request->team_id; //2.投稿idの取得
                
        $already_liked = Favorite::where('user_id', $user_id)->where('team_id', $team_id)->first(); //3.

        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Favorite; //4.Likeクラスのインスタンスを作成
            $like->team_id = $team_id; //Likeインスタンスにreview_id,user_idをセット
            $like->user_id = $user_id;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Favorite::where('team_id', $team_id)->where('user_id', $user_id)->delete();
        }
        
        //5.この投稿の最新の総いいね数を取得
        $review_likes_count = Team::withCount('favorite')->findOrFail($team_id)->favorite_count;
        $param = [
            'review_likes_count' => $review_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
        
    }
    


    public function redirect(){
        $team = New Team;
        $teams =$team->all()->toArray();
        
        // dd($search);
        return view('top',[
            'teams'=>$teams,
            
        ]);
    }
    
}
