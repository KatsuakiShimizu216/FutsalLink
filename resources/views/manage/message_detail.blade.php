
@extends('layouts.layout')
@section('content') 

  <div class="container">
    <div class="row mt-5 mb-5">
        <!-- <div class="col-1"></div> -->
        <div class="col-5 text-left h1 mb-5">メッセージ内容</div>
    </div>
    <div class="row mt-5">
      <!-- <div class="col-1"></div> -->
      <div class="col-2 text-left h3">募集チーム名:</div>
      <div class="text-left h3">{{$team[0]['team']}}</div>   
    </div>

    <div class="d-flex flex-column">
      <div class="row">
          <div class="col-2 text-left h3 mt-5">名前:</div>
          <div class="text-left h3 mt-5">{{$messe[0]['name']}}</div>
      </div>
      <div class="row">
          <div class="col-2 text-left h3 mt-5">生年月日:</div>
          <div class="text-left h3 mt-5">{{$messe[0]['birth']}}</div>
      </div>
      <div class="row">
          <div class="col-2 text-left h3 mt-5">ポジション:</div>
          <div class="text-left h3 mt-5">{{$messe[0]['possision']}}</div>
      </div>

      <div class="row">
          <div class="col-2 text-left h3 mt-5">メールアドレス:</div>
          <div class="text-left h3 mt-5">{{$messe[0]['email']}}</div>
      </div>

      <div class="row">
          <div class="col-2 text-left h3 mt-5">競技歴　:</div>
          <div class="text-left h3 mt-5">{{$messe[0]['career']}}</div>
      </div>

          <div class="col-8 text-left h3 mt-5">コメント（アピールポイントなど）:
          </div>
          <div class="text-left h3 mt-3 mb-5">{{$messe[0]['comment']}}</div>
    </div>

    <div class="text-center m-5">
        <form action="{{route('delete.messe',['message'=>$messe[0]['id']])}}" method ="post">
            @csrf
            <button type="submit" class="btn  btn-outline-danger" onclick="return confirm('このメッセージを削除しますか？')">このメッセージを削除</button>
        </form>
    </div>
      
  </div>
@endsection