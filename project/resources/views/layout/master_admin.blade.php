<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/vendors/bootstrap.css">
    <link rel="stylesheet" href="/vendors/main.css">
    <link rel="stylesheet" href="/vendors/flexslider.css">
    <link rel="stylesheet" href="/css/alex.css">
    <link rel="stylesheet" href="/vendors/smoke.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Vlambeer</title>
</head>

<body class="admin">
<!-- Begin header -->
<div class="admin-header">
    <div class="title">
        <div class="login col-md-2 pull-right">
            @if(Auth::user())

                @if(Auth::user()->insertion)
                    <p>{{Auth::user()->first_name . ' ' . Auth::user()->insertion . ' ' . Auth::user()->last_name}}</p>
                @else
                    <p>{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                @endif
            @endif
        </div>
    </div>
</div>
<!-- End of header-->
    <div class="nav col-md-1">
        <ul>
            <li class="home">
                <i class="fa fa-home"></i>
                <h4>Vlambeer website</h4>
                {{--<h4>Home</h4>--}}
                <a href="/"></a>
            </li>
            <li class="headnav">
                <i class="fa fa-user"></i>
                <h4>Users</h4>
                <a href="/admin/user"></a>
            </li>
            <li class="headnav">
                <i class="fa fa-shopping-cart"></i>
                <h4>Shop</h4>
                <a href="/admin/shop"></a>
            </li>
            <li class="headnav">
                <i class="fa fa-gamepad"></i>
                <h4>Games</h4>
                <a href="/admin/games"></a>
            </li>
            <li class="headnav">
                <i class="fa fa-envelope"></i>
                <h4>Newsletter</h4>
                <a href="#"></a>
            </li>
        </ul>
    </div>


{{--section--}}
<div class="col-md-11 section">
    @yield('section')
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
{{--<script src="/js/requirejs.js"></script>--}}
{{--<script src="/js/jquery.vide.js"></script>--}}
{{--<script src="/js/jquery.smoke.js"></script>--}}
<script src="/js/main.js"></script>
<!-- Slider Javascript file -->
<script src="/js/jquery.flexslider.js"></script>
</body>

</html>

{{--<ul class="subnav hide">--}}
    {{--<li>--}}
        {{--<i class="fa fa-user-plus"></i>--}}
        {{--<h4>Add</h4>--}}
    {{--</li>--}}
    {{--<li>--}}
        {{--<i class="fa fa-pencil"></i>--}}
        {{--<h4>Edit</h4>--}}
    {{--</li>--}}
    {{--<li>--}}
        {{--<i class="fa fa-user-times"></i>--}}
        {{--<h4>Remove</h4>--}}
    {{--</li>--}}
{{--</ul>--}}