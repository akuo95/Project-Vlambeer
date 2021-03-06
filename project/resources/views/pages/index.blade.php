@extends('layout.master')

@section('section')
    <div class="container">
        {{--@if (Session::has('flash_message'))--}}
            {{--<div class="alert alert-success">{{Session::get('flash_message')}}</div>--}}
        {{--@endif--}}
        @foreach($games as $game)
            <div class="game-post">
                <div class="img clickable" onclick="javascript:location.href='info_game/{{$game['id']}}'" style="background: url({{$game['game_background_img']}})"> </div>
                <div class="title">
                    <h1>{{$game['game_name']}}</h1>
                </div>
                <div class="game-buy">
                    <h2>Buy this game now!</h2>
                    @if($game['steam_payment_link'] != null)
                        <a href="{{$game['steam_payment_link']}}">
                            <div class="payment-img" id="steam"></div>
                        </a>
                    @endif
                    @if($game['ios_payment_link'] != null)
                        <a href="{{$game['ios_payment_link']}}">
                            <div class="payment-img" id="apple"></div>
                        </a>
                    @endif
                    @if($game['psn_payment_link'] != null)
                        <a href="{{$game['psn_payment_link']}}">
                            <div class="payment-img" id="playstation"></div>
                        </a>
                    @endif
                    @if($game['android_payment_link'] != null)
                        <a href="{{$game['android_payment_link']}}">
                            <div class="payment-img" id="android"></div>
                        </a>
                    @endif
                    @if($game['custom_payment_link'] != null)
                        <a href="{{$game['custom_payment_link']}}">
                            <i class="fa fa-shopping-cart fa-3x"></i>
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection