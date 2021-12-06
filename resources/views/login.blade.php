<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('front/css/stack-interface.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('front/css/socicon.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front/css/stack-interface.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front/css/theme.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('front/css/custom.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700" rel="stylesheet">

</head>
<body>
<div class="main-container">
    <section class="imageblock switchable feature-large space--md bg--dark">
        <div class="imageblock__content col-lg-6 col-md-4 pos-right">
            <div class="background-image-holder"> <img alt="image" src="{{asset('front/img/6-29ar212021-1024x640.jpg')}}"> </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7">
                    <h2><b>Sinai University Scientific Research Portal</b></h2>
                    <p class="lead">Sign In&nbsp;</p>
                    <form action="{{route('front.login')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="row">
                            <div class="col-12"> <input type="email" name="email" placeholder="Email Address"> </div>
                            <div class="col-12"> <input type="password" name="password" placeholder="Password"> </div>
                            <div class="col-12"> <button type="submit" class="btn btn--primary type--uppercase">Sign In</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script src=" {{asset('front/js/jquery-3.1.1.min.js')}}"></script>
<script src=" {{asset('front/js/parallax.js')}}"></script>
<script src=" {{asset('front/js/smooth-scroll.min.js')}}"></script>
<script src=" {{asset('front/js/scripts.js')}}"></script>

</body>

</html>
