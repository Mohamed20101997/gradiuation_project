@extends('layouts.dashboard.app')

@section('content')
    <h1>Doctors</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('doctor.index') }}">Doctors</a></li>
        <li class="breadcrumb-item" active>Update</li>
    </ul>

    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('doctor.update', $doctor->id)}}"
                      method="post">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$doctor->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter the name" class="form-control" required value="{{ old('name',$doctor->name) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-6">
                            {{-- Email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"  placeholder="Enter the email"  name="email" class="form-control" required value="{{ old('email',$doctor->email) }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Email --}}

                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"  placeholder="Enter your complexity password"   name="password" class="form-control" >
                                @error('Password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                        <div class="col-md-6">
                            {{-- Password confirmation --}}
                            <div class="form-group">
                                <label>Password confirmation</label>
                                <input type="password" name="password_confirmation"   placeholder="Re-enter your password"  class="form-control">
                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password confirmation --}}

                    </div>{{-- end of row --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                    </div>
                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection
