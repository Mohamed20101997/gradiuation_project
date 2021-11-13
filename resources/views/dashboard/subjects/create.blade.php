@extends('layouts.dashboard.app')

@section('content')
<h1>Subjects</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subject.index') }}">Subjects</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


<div class="row">
    <div class="col-md-12">

        <div class="tile mb4">
            <form method="POST" action="{{ route('subject.store') }}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-md-8">
                        {{-- Name --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Enter the subject name" class="form-control" required value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of col name --}}

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Hours</label>
                            <input  name="hours"  type="number" value="{{ old('hours') }}" min="1" max="10" class="form-control" placeholder="Enter the subject hours" required>
                            @error('hours')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                </div> {{-- end of row --}}


                <div class="row">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Colleges</label>
                            <select name="college_id" class="form-control select2" required>
                                <option value="">Select College</option>
                                @foreach($colleges as $college)
                                    <option value="{{$college->id}}" {{ old('college_id') == $college->id ? 'selected' :' ' }}>{{$college->name}}</option>
                                @endforeach
                            </select>
                            @error('college_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>{{-- end of college --}}


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Semesters</label>
                            <select name="semester_id" class="form-control select2" required>
                                <option value="">Select Semester</option>
                                @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}" {{ old('semester_id') == $semester->id ? 'selected' :' ' }}>{{$semester->name}}</option>
                                @endforeach
                            </select>
                            @error('semester_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of Semester --}}


                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Doctors</label>
                            <select name="doctor_id" class="form-control select2" required>
                                <option value="">Select Doctor</option>
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}" {{ old('semester_id') == $doctor->id ? 'selected' :' ' }}>{{$doctor->name}}</option>
                                @endforeach
                            </select>
                            @error('doctor_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div> {{-- end of doctor --}}

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                    </div>
                </div>

            </form>

        </div> {{-- end of tile  --}}

    </div> {{-- end of col  --}}
</div> {{-- end of row  --}}


@endsection
