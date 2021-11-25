@extends('layouts.dashboard.app')

@section('content')

    <h1>Subjects</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Subjects</li>
    </ul>

    <div class="row">
            @if ($subjects->count() > 0)
                @foreach ($subjects as $index=>$subject)
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title"><i class="fa fa-book"></i> {{ $subject->name }}</h3>

                        <div class="tile-body">
                            <p><i class="fa fa-building-o"></i> College   : {{ $subject->college->name }}  </p>
                            <p><i class="fa fa-bars"></i> Semester  : {{ $subject->semester->name }} </p>
                            <p><i class="fa fa-hourglass-end"></i> Hours     : {{ $subject->hours }}          </p>
                        </div>

                        <div class="tile-footer"><a class="btn btn-primary" href="{{ route('subject.doctor.files', $subject->id) }}">Files</a></div>
                    </div>
                </div> {{-- end of col  --}}
                @endforeach
            @endif
    </div> {{-- end of row  --}}
@endsection
