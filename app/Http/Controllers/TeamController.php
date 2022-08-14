<?php

namespace App\Http\Controllers;

use App\Team;
use App\Player;
use App\Fsvorite;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateTeam;

class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store','create','index','edit',]]);
        $this->middleware('can:system-only', ['only' => ['store','create','index','edit',]]);
    
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team=Auth::user()->team()->get()->toArray();
        
        return view('manage/team_list',[
            'teams'=>$team,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage/team_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeam $request)
    {
        $team=new Team;

        $columns=['team','email','level','place','address','title','comment'];

        foreach($columns as $column){
            $team->$column =$request->$column;
            }
        
        if(request('img')){
            $original=request()->file('img')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            $file=request()->file('img')->move('storage/images',$name);
            $team->img=$name;
        }else{
            $name="top.jpg";
            $team->img=$name;
        }


        Auth::user()->team()->save($team);     
        return redirect('/team');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Team $team)
    {
        $id = $team['user_id'];
        $user=new User;
        $name=$user->where('id',$id)->get()->toArray();
        
        $favorite=[
            'liked'=>$team->isFavoriteBy(Auth::user()),
            'team_id'=>$team['id'],
            'count' =>$team->getFavoriteCount(),
        ];

        ;
        // var_dump($id);
        // dd($name);
        return view('team/team_detail',[
             'team'=>$team,   
             'name'=>$name,
             'favorite'=>$favorite,  
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $user=Auth::user()->id;
        if($user===$team['user_id']){
        
            return view('manage/team_edit',[
                'team'=>$team,
            ]);
        }else{
            abort(403);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $columns=['team','email','level','place','address','title','comment'];

        foreach($columns as $column){
            $team->$column =$request->$column;
            }
    
            $team->save();

            return redirect('/team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
            return redirect('/team');
    
        }
}
