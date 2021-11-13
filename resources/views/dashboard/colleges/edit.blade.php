@extends('layouts.dashboard.app')

@section('content')
    <h1>Colleges</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('college.index') }}">Colleges</a></li>
        <li class="breadcrumb-item" active>Update</li>
    </ul>

    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('college.update', $college->id)}}"
                      method="post">
                    @csrf
                    @method('put')
                    <input name="id" value="{{$college->id}}" type="hidden">

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter the name" class="form-control" required value="{{ old('name',$college->name) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
                            </div>
                        </div>

                    </div> {{-- end of row --}}


                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection
