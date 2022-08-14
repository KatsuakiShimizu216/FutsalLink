@extends('layouts.layout')
@section('content')     
    
    <div class="container-fluid ">
        <div class="row">
            <div class="col-1"></div>   
            <div class="col-3 h2 mt-5">★お気に入りチーム</div>

        </div>
    </div>
        
        
    @foreach($teams as $team)
            
            <div class="container-fluid mt-4 ">
                <div class="row">
                    <div class="col-1"></div>
                   
                    <div class="card col-9 ">
                        <a href="{{route('team.show',['team'=>$team['id']])}}">
                            <div class="card-body ">
                                <img src="/storage/images/{{$team['img']}}" class="img-fluid col-md-3 float-left pb-1 mb-3" alt="..." style="width:100%;height:150px" >
                                <div class="d-flex flex-column">
                                    <span class="h4">{{$team['team']}}</span>
                                    <span class="h1">{{$team['title']}}</span>

                                </div>
                            </div>
                        </a>    
                    </div>
            
                    

                </div>
            </div>
           
        @endforeach
    </div>

    @endsection