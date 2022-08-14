@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-5 text-left h1">チームの投稿内容編集</div>
                
            </div>
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif


            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="row mt-5">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <label for='title' class='mt-2 h3' >タイトル</label>
                        <textarea class='form-control' name='title'>{{$team['title']}}</textarea>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-1"></div>
                    <div class="col-5">
                        <div class="d-flex flex-column">
                            <div class="form-group row">
                                    <label for="team_name" class="h3 mt-5 col-3">チーム名:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mt-5"  name="team" value="{{$team['team']}}" /> 
                                    </div>               
                            </div>

                            <div class="form-group row">
                                    <label for="email" class="h3 mt-4 col-3">メールアドレス:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control mt-5"  name="email" value="{{$team['email']}}" /> 
                                    </div>               
                            </div>

                            <div class="form-group row">
                                    <label for="level" class="h3 mt-5 col-3">競技レベル:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mt-5"  name="level" value="{{$team['level']}}" /> 
                                    </div>               
                            </div>
                           
                            <div class="form-group row">
                                    <label for="place" class="h4 mt-5 col-3">主な活動場所:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mt-5"  name="place" value="{{$team['place']}}" /> 
                                    </div>               
                            </div>
                            <div class="form-group row">
                                    <label for="address" class="h4 mt-5 col-3">主な活動場所の住所:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control mt-5"  name="address" value="{{$team['address']}}" /> 
                                    </div>               
                            </div>
    
                        </div>
                    </div>
                
                        <img src="/storage/images/{{$team['img']}}" class="img-fluid col-5 float-left" alt="..." style="width:100%" > 
                </div> 
                <div class="row">
                    <div class="col-6"></div>
                    <div class=" mb-5 mt-2 col-5">
                        <input type="file" id="img" name="img" class="form-control">

                    </div> 
                </div>
                <div class="row mt-5">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <label for='comment' class='mt-2 h3' >コメント</label>
                        <textarea class='form-control' name='comment'>{{$team['comment']}}</textarea>
                    </div>
                </div>
                
                <div class="text-center m-5">
                    <button type="submit" class="btn btn-success">保存</button>
                </div>
            </form>
            

        </div>
    </div>
@endsection