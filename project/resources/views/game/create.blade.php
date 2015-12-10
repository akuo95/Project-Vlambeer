@extends('layout.master')

@section('section')
<div class="container">
    <div class="col-md-4 col-md-push-4">

        <h3>Add Game</h3>

        @if($errors->has())
            <ul class="list-group">
                @foreach($errors->all()as $error)
                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>

                @endforeach
            </ul>

        @endif

        <form action="{{ action('GamesController@store') }}" method="post" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="form-group">
                <label for="game_name">Game</label>

                <select name="id" style="color:black">
                    <option value=""></option>

                    @foreach($gameNames as $gameName)
                        <option value="{{ $gameName['id'] }}">{{ $gameName['name'] }}</option>
                    @endforeach
                </select>
        </div>

        <div class="form-group">
            <label for="game_background_video">Game Background Video</label>
            <input type="file" name="game_background_video" accept="video/*">
        </div>

        <div class="form-group">
            <label for="game_background_img">Game Background Image</label>
            <input class="form-control" type="text" name="game_background_img" >
        </div>

        <div class="form-group">
            <label for="poster">Game Poster Image</label>
            <input class="form-control" type="text" name="poster">
        </div>

        <div class="form-group">
            <label for="regular_payment_link">Regular Payment Link</label>
            <input class="form-control" type="text" name="regular_payment_link">
        </div>

        <div class="form-group">
            <label for="steam_payment_link">Steam Payment Link</label>
            <input class="form-control" type="text" name="steam_payment_link">
        </div>

        <div class="form-group">
            <label for="ios_payment_link">IOS Payment Link</label>
            <input class="form-control" type="text" name="ios_payment_link">
        </div>

        <div class="form-group">
            <label for="psn_payment_link">PSN Payment Link</label>
            <input class="form-control" type="text" name="psn_payment_link">
        </div>

        <div class="form-group">
            <label for="android_payment_link">Android Payment Link</label>
            <input class="form-control" type="text" name="android_payment_link">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit">
        </div>

    </form>
        </div>
</div>

@endsection