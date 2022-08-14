
@extends('layouts.layout') 

@section('content') 
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header h1 text-center">パスワード変更</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
             <form action="{{route('password.update')}}" method="post"> <!--{ route('login') } -->
              @csrf
              <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" /> <!--{ old('email') }-->
              </div>
              <div class="form-group">
                <label for="password-confirm">パスワード再確認</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" />
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">変更</button>
              </div>
              <input type="hidden" name="token" value="{{$token}}">
              <input type="hidden" name="email" value="{{$email}}">
            </form>
          </div>
        </nav>
        
      </div>
    </div>
  </div>
  @endsection   
