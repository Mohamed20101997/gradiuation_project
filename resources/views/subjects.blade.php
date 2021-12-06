@extends('layouts.front.app')

@section('content')
<section class="categories_style_v1 section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_title text-center">
                    <h2>{{$semester_name->name}}</h2>
                    <h3>choose the Subject</h3>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($subjects) > 0)
                @foreach($subjects as $subject)
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <a href="{{route('front.uploads', $subject->id)}}" class="categorie_box bg_image wow slideInUp">
                        <span class="bg_overlay"></span>
                        <div class="domar_content">
                            <h4>{{$subject->name}}</h4>
                            <h5>Hours : {{$subject->hours}}</h5>
                        </div>
                    </a>
                </div>
            @endforeach
            {{ $subjects->appends(request()->query())->links() }}
            @else
                <h3 class="alert alert-info text-center d-flex justify-content-center"
                    style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i>
                    Sorry no records found</h3>
            @endif
        </div>

    </div>
</section>
@endsection
