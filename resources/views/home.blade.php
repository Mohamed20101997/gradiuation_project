@extends('layouts.front.app')

@section('content')
<section class="categories_style_v1 section_padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section_title text-center">
                    <h2>choose the Semester</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if(count($semesters) > 0)
             @foreach($semesters as $semester)
                <div class="col-lg-3 col-md-6 col-sm-12">
                <a href="{{route('front.getSubjects', $semester->id)}}" class="categorie_box bg_image wow slideInUp">
                    <span class="bg_overlay"></span>
                    <div class="domar_content">
                        <h4>{{$semester->name}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
                 {{ $semesters->appends(request()->query())->links() }}
            @else
                <h3 class="alert alert-info text-center d-flex justify-content-center"
                    style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i>
                    Sorry no records found</h3>
            @endif


        </div>
    </div>
</section>
@endsection
