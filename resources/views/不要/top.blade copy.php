@extends('layouts.layout')
@section('content')     
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
        @for($i = 1; $i <= 10; $i++)
            
            <div class="container-fluid mt-4 ">
                <a href="">
                    <div class="card w-100 ">
                        <div class="card-body  ">
                            <img src="/images/top.jpg" class="img-fluid col-md-3 float-left" alt="..." style="width:100%" >
                            <div class="d-flex flex-column">
                                <span class="h4">team</span>
                                <span class="h1">title</span>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
           
        @endfor
    </div>

    @endsection