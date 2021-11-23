@extends('layouts.dashboard.app')

@section('content')

    <h1>Doctors</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item" active>Doctors</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" autofocus name="search" placeholder="search" class="form-control" value="{{ request()->search }}">
                            </div>
                        </div><!-- end of col 4 -->

                        <div class="col-4">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i>Search</button>
                            <a href="{{ route('doctor.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>Add</a>
                        </div> <!-- end of col 12 -->

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($doctors->count() > 0)
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($doctors as $index=>$doctor)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>


                                        <td>
                                            <a href="{{ route('doctor.edit', $doctor->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>

                                            <form method="post" action={{ route('doctor.destroy', $doctor->id)}} style="display:inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                            </form> <!-- end of form -->

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            {{ $doctors->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> Sorry no records found</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection
