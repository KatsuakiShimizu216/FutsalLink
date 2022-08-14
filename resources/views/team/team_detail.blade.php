@extends('layouts.layout')
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-9 text-left h1">●チーム詳細</div>
                
    
                
                @auth
                    <div class="col-2  ">    
                        <span class="">お気に入り
                            
                            <div class="col-10"></div>
                            <div class="ml-3">
                                @if (!$favorite['liked'])
                                    
                                        <i class="fas fa-star like-toggle " data-review-id="{{$favorite['team_id']}}" style="width:50px;height:50px"></i>
                                
                                @else
                                
                                        <i class="fas fa-star  like-toggle  liked" data-review-id="{{$favorite['team_id']}}" style="width:50px;height:50px"></i>

                                @endif
                                <span class="like-counter">{{$favorite['count']}}</span>
                            </div>
                        
                        </span>
                    </div>
                @endauth
           
           
            </div>
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-1 text-left h3">投稿者名:</div>
                <div class="text-left h3">{{$name[0]['name']}}</div>   
            </div>
            <div class="row mt-5 mb-5">
                <div class="col-1"></div>
                <div class="col-10 text-left h1">{{$team['title']}}</div>
            </div>
            
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-4">
                    <div class="d-flex flex-column">
                        <div class="row">
                            <div class="col-4 text-left h3 mt-5">チーム名:</div>
                            <div class="text-left h3 mt-5">{{$team['team']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-left h3 mt-5">連絡先:</div>
                            <div class="text-left h3 mt-5">{{$team['email']}}</div>
                        </div>
                        <div class="row">
                            <div class="col-4 text-left h3 mt-5">競技レベル:</div>
                            <div class="text-left h3 mt-5">{{$team['level']}}</div>
                        </div>

                        <div class="row">
                            <div class="col-4 text-left h3 mt-5">主な活動場所:</div>
                            <div class="text-left h3 mt-5">{{$team['place']}}</div>
                        </div>
                    </div>
                </div>
                <img src="/storage/images/{{$team['img']}}" class="img-fluid col-6 float-left" alt="..." style="width:100%" > 
            </div>
            <div class="row mt-5">
                <div class="col-1"></div>
                <div class="col-10 text-left h3 mt-5">コメント</div>
            </div>
            <div class="row mb-5">
                <div class="col-1"></div>
                <div class="col-10 text-left h3 mt-2">{{$team['comment']}}</div>
            </div>

            <div class="row mt-5">
                <div class="col-2"></div>
                <div class="col-1 text-left h4">住所:</div>
                <div class="text-left h4">{{$team['address']}}</div>   
            </div>
            <div class="row mt-5 mb-5">          
            <div class="col-2"></div>
                <iframe width="800" height="500" frameborder="0" style="border: 0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDe3UrkJjGECh9eU-qcT-rtCUAuP_hPKBE&q={{$team['address']}}" allowfullscreen></iframe>
            </div>
            <div class="text-center mb-5">
                <a href="{{route('message.form',['team'=>$team['id']])}}">
                    <button type="botton" class="btn btn-light btn-outline-primary">メッセージを送る</button>
                </a>
            </div>
        </div>
    </div>
    
    
    
@endsection
