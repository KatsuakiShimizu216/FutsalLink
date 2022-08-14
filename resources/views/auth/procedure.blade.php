

@extends('layouts.layout') 

@section('content') 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-8">
        <nav class="card mt-5">
          <div class="card-header h1 text-center">パスワード変更手続き</div>
          <div class="card-body">
            <!-- if($errors->any())
              <div class="alert alert-danger">
                foreach($errors->all() as $message)
                  <p>{ $message }</p>
                endforeach
              </div>
            endif -->
             <form action="{{url('/password/email')}}" method="POST"> <!--{ route('login') } -->
              @csrf
              <div class="form-group mt-5">
                <label for="email">　登録済みのメールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="" /> <!--{ old('email') }-->
              </div>
              <span>　※上記のメールアドレスにパスワード変更のURLを送ります。</span>
              <div class="text-center mt-5">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center d-flex flex-column mt-5">
        <a href="{{route('login') }}">戻る</a>
        </div>
      </div>
    </div>
  </div>
@endsection
