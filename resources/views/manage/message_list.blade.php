@extends('layouts.layout')
@section('content')     

     <div class="col-3 h2 m-5">メッセージ一覧</div>
        @foreach($messages as $message)
            
            <div class="container-fluid mt-4 ">
                <div class="row">
                    <div class="col-1"></div>
                   
                    <div class="card col-9 ">
                        <a href="{{route('messe.detail',['message'=>$message['id']])}}">
                            <div class="card-body ">
                                    <span class="h3">{{$message['created_at']}}&nbsp;&nbsp;&nbsp;&nbsp;応募者&nbsp;:&nbsp;{{$message['name']}}&nbsp; &nbsp;&nbsp;&nbsp;応募チーム&nbsp;:&nbsp;{{$message['team']}}</span>
                                </div>
                            </div>
                        </a>    
                    </div>
            
                </div>
            </div>
           
        @endforeach
    </div>

    @endsection