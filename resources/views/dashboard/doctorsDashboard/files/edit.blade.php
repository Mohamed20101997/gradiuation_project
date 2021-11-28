@extends('layouts.dashboard.app')

@section('content')
    <h1>Files</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('subject.doctor.files',$file->subject_id) }}">Files</a></li>
        <li class="breadcrumb-item" active>Update</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form class="form" action="{{route('subject.doctor.update', $file->id)}}" method="post" enctype="multipart/form-data" files="true">
                    @csrf
                    @method('post')
                    <input name="id" value="{{$file->id}}" type="hidden">
                    <div class="row">
                        <div class="col-md-8">
                            {{-- title --}}
                            <div class="form-group">
                                <label>title</label>
                                <input type="text" name="title" placeholder="Enter the subject name" class="form-control" required value="{{ old('title',$file->title) }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col title --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>File</label>
                                <input  name="files"  type="file" value="{{ old('files') }}" min="1" max="10" class="form-control">
                                @error('files')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                    </div> {{-- end of row File --}}


                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>

                                <textarea  name="description" rows="4" cols="50" class="form-control">{{old('description',$file->description)}}</textarea>

                                @error('description')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of description --}}


                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update<i class="fa fa-plus"></i></button>
                        </div>
                    </div>

                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection

