
@extends('layouts.layout')
@section('content')


  <div class="container">
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="col-5 text-left h1">メッセージ入力</div>
    </div>
    <div class="row mt-5">
      <div class="col-1"></div>
      <div class="col-2 text-left h3">募集チーム名:</div>
      <div class="text-left h3">{{$team['team']}}</div>   
    </div>
    <div class="row justify-content-center">           
      <div class="col col-md-offset-1 col-md-10">
        <nav class="card mt-3 mb-5">
          <div class="card-header "></div>
          <div class="card-body" >
           
            <form action="{{route('message.conf',['team'=>$team['id']])}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">名前</label><span style="color:red">&nbsp;*@if($errors->has('name')){{ $errors->first('name') }}@endif</span>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" /> 
              </div>
              
              <div class="form-group">
                <label for="birth">生年月日</label><span style="color:red">&nbsp;*@if($errors->has('birth')){{ $errors->first('birth') }}@endif</span>
                <input type="date" class="form-control" name="birth" value="{{ old('birth') }}">
              </div>
              
              <div class="form-group">
                <label for="password-confirm">ポジション</label>
                <input type="text" class="form-control" name="possision" value="{{old('possision')}}">
              </div>

              <div class="form-group">
                <label for="email">メールアドレス</label><span style="color:red">&nbsp;*@if($errors->has('email')){{ $errors->first('email') }}@endif</span>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email')}}" />  
              </div>

              <label for='career' class='mt-2'>競技歴</label>
              <textarea class='form-control' name='career'>{{old('career')}}</textarea>

              <label for='comment' class='mt-2'>コメント(アピールポイントなど)</label>
              <textarea class='form-control' name='comment'>{{old('comment')}}</textarea>

              <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary">内容確認</button>
              </div>
            </form>
          </div>
        </nav>
       
    </div>
  </div>
@endsection