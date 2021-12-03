@extends('layouts.front.app')

@section('content')

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

@endsection
