
@extends('layouts.layout')
@section('content') 

  <div class="container">
    <div class="row mt-5 mb-5">
        <!-- <div class="col-1"></div> -->
        <div class="col-5 text-left h1 mb-5">メッセージ内容確認</div>
    </div>
    <div class="row mt-5">
      <!-- <div class="col-1"></div> -->
      <div class="col-2 text-left h3">募集チーム名:</div>
      <div class="text-left h3">{{$team['team']}}</div>   
    </div>

    <div class="d-flex flex-column">
      <div class="row">
          <div class="col-2 text-left h3 mt-5">名前:</div>
          <div class="text-left h3 mt-5">{{$messe['name']}}</div>
      </div>
      <div class="row">
          <div class="col-2 text-left h3 mt-5">生年月日:</div>
          <div class="text-left h3 mt-5">{{$messe['birth']}}</div>
      </div>
      <div class="row">
          <div class="col-2 text-left h3 mt-5">ポジション:</div>
          <div class="text-left h3 mt-5">{{$messe['possision']}}</div>
      </div>

      <div class="row">
          <div class="col-2 text-left h3 mt-5">メールアドレス:</div>
          <div class="text-left h3 mt-5">{{$messe['email']}}</div>
      </div>

      <div class="row">
          <div class="col-2 text-left h3 mt-5">競技歴　:</div>
          <div class="text-left h3 mt-5">{{$messe['career']}}</div>
      </div>

          <div class="col-8 text-left h3 mt-5">コメント（アピールポイントなど）
          </div>
          <div class="text-left h3 mt-3 mb-5">{{$messe['comment']}}</div>
    </div>

    <form method="POST" action="{{ route('message.comp',['team'=>$team['id']]) }}">
      @csrf
      <input name="name" value="{{ $messe['name'] }}" type="hidden">
      <input name="email" value="{{ $messe['email'] }}" type="hidden">
      <input name="birth" value="{{ $messe['birth'] }}" type="hidden">
      <input name="possision" value="{{ $messe['possision'] }}" type="hidden">
      <input name="career" value="{{ $messe['career'] }}" type="hidden">
      <input name="comment" value="{{ $messe['comment'] }}" type="hidden">

      <div class='d-flex justify-content-center m-5'>
        <div class="text-center">
          <button type="submit" class="btn  btn-primary">送信</button>
        </div>
    </form>
        
    <div class= m-5></div>
        <div class="text-center">
          <form class="return" method="POST" action="{{ route('message.form',['team'=>$team['id']]) }}" >
            <input type="botton" value="戻る" onClick='history.back()' class="btn  btn-outline-dark " style="width: 60px"/>
          </form>  
        </div>
      </div>      

  </div>
@endsection