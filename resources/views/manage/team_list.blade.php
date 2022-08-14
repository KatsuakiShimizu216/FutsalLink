@extends('layouts.layout')
@section('content')     

     <div class="col-3 h2 m-5">投稿チーム一覧</div>
        @foreach($teams as $team)
            
            <div class="container-fluid mt-4 ">
                <div class="row">
                    <div class="col-1"></div>
                   
                    <div class="card col-9 ">
                        <a href="{{route('team.edit',['team'=>$team['id']])}}">
                            <div class="card-body ">
                                <img src="/storage/images/{{$team['img']}}" class="img-fluid col-md-3 float-left pb-1 mb-3" alt="..." style="width:100%;height:150px;" >
                                <div class="d-flex flex-column">
                                    <span class="h4">{{$team['team']}}</span>
                                    <span class="h1">{{$team['title']}}</span>
                                </div>
                            </div>
                        </a>    
                    </div>
            
                    <div class='d-flex flex-column m-5'>
                        <div class="text-center">
                            <a href="{{route('team.edit',['team'=>$team['id']])}}">
                                <button type="submit" class="btn  btn-outline-success">編集</button>
                            </a>
                        </div>
                        <div class= m-2></div>
                        <div class="text-center">
                            <form action="{{route('delete.team',['team'=>$team['id']])}}" method ="post">
                            @csrf    
                                <button type="submit" class="btn btn-outline-danger" onclick="return confirm('この投稿を削除しますか？')">削除</button>
                            </form>    
                        </div>
                    </div>      

                </div>
            </div>
           
        @endforeach
    </div>

    @endsection