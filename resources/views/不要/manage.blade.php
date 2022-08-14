@extends('layouts.layout')
@section('content')
<div class="d-flex flex-column">
        <div class="container-fluid mt-5">
            <div class="col-3 h2">チーム管理画面</div>
            
        </div>            
        <div class="container-fluid mt-4 ml-5 ">
            <a href="">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class=" ml-5 h1">新規チーム投稿</span>
                       
                    </div>
                </div>
            </a>
        </div>
        <div class="container-fluid mt-4 ml-5 ">
            <a href="">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class="h1 ml-5">投稿チーム一覧</span>
                       
                    </div>
                </div>
            </a>
        </div>
        <div class="container-fluid mt-4 ml-5 ">
            <a href="">
                <div class="card w-75 ">
                    <div class="card-body  ">
                            <span class="h1 ml-5">メッセージ一覧</span>
                       
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection