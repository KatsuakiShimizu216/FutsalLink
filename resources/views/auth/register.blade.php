
@extends('layouts.layout')
@section('content')


  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header h1 text-center">新規登録</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif 
            
            <form action="{{ route('register') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="name">・名前（ニックネーム）</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" /> 
              </div>
              <div class="form-group mb-4">
                <label for="email">・メールアドレス</label>
                  <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" /> 
              </div>

              <div class="form-group row ">
                <label for="radio01" class="col-md-3">・利用目的</label>
                <div class="col-md-8">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="role0" name="role" value="0"  checked="checked" />
                      <label class="form-check-label" for="inlineRadio01">チームを探す</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio"  id="role1" name="role" value="1" />
                      <label class="form-check-label" for="inlineRadio02">チームの投稿</label>
                    </div>
                    
                </div>
              </div>
              
              <div class="form-group">
                <label for="password">・パスワード</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
              <div class="form-group">
                <label for="password-confirm">・パスワード再確認</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">会員登録</button>
              </div>
            </form>



          </div>
        </nav>
        <div class="text-center d-flex flex-column">
          <a href="{{route('login') }}">既に会員登録済みの方はログインへ</a>
      </div>
    </div>
  </div>
@endsection