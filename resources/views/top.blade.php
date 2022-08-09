@extends('layouts.layout')
@section('content')   

<!-- チーム管理者のみ -->
@can('system-only')
<div class="d-flex flex-column">
        <div class="container-fluid mt-5">
            <div class="col-3 h2">チーム管理画面</div>
            
        </div>            
        <div class="container-fluid mt-4 ml-5 ">
            <a href="{{route('team.create')}}">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class=" ml-5 h1">新規チーム投稿</span>
                       
                    </div>
                </div>
            </a>
        </div>
        <div class="container-fluid mt-4 ml-5 ">
            <a href="{{route('team.index')}}">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class="h1 ml-5">投稿チーム一覧</span>
                       
                    </div>
                </div>
            </a>
        </div>
        <div class="container-fluid mt-4 ml-5 ">
            <a href="{{route('messe.list')}}">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class="h1 ml-5">メッセージ一覧</span>
                       
                    </div>
                </div>
            </a>
        </div>
    </div>

<!--ゲスト　一般ユーザー  -->
@else
    <div class="gazo mb-5">
        <img src="/images/top.jpg" class="img-fluid  img_size" alt="..." style="width:100%" >
    </div>
    <div class="d-flex flex-column">
        <div class="container-fluid ">
            <div class="col-3 h2">投稿チーム一覧</div>
            
            <div class="input-group w-25 float-right mr-3 mb-3">
                <input type="text" class="form-control" placeholder="キーワードを入力">
                <button class="btn btn-success" type="button" id="button-addon2"><i class="fas fa-search"></i> 検索</button>
            </div>
        </div>
        @foreach($teams as $team)
            
            <div class="container-fluid mt-4 mb-2 ">
                
                <a href="{{route('team.show',['team'=>$team['id']])}}">
                    <div class="card w-100 ">
                        <div class="card-body  ">
                            <img src="/images/top.jpg" class="img-fluid col-md-3 float-left" alt="..." style="width:100%" >
                            <div class="d-flex flex-column">
                                <span class="h4">{{$team['team']}}</span>
                                <span class="h1">{{$team['title']}}</span>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
           
        @endforeach
    </div>

@endcan


@endsection