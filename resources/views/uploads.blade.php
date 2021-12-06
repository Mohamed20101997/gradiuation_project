@extends('layouts.front.app')

@section('content')
    <section class="categories_style_v1 section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_title text-center">
                        <h2> {{ $subjectName->name }} </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if ($uploads->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Uploads</th>
                                    <th>Doctor</th>
                                    <th>Description</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($uploads as $index=>$upload)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $upload->title }}</td>
                                        <td><a href="{{image_path($upload->files)}}" download="{{$upload->title}}"><i class="fa fa-download"></i></a></td>
                                        <td>{{ $upload->doctor->name }}</td>
                                        <td>
                                            <button type="button" data-id="{{$upload->id}}"  data-url="{{route('front.get_model')}}"  id="description" class="btn btn-primary btn-sm"><i class="fa fa-info fa-sm"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

                            {{ $uploads->appends(request()->query())->links() }}

                            @else
                                <h3 class="alert alert-info text-center d-flex justify-content-center"
                                    style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i>
                                    Sorry no records found</h3>
                            @endif
                        </div> <!-- end of col-md-12 -->
                </div>
            </div>

        </div>
    </section>
@endsection

@section('js')
    <script>
        //for show extra model
        $(document).on('click', '#description', function (event) {
            event.preventDefault();
            let url = $(this).data('url');
            let id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                data: {
                    'id': id
                },
                method: 'GET',
                success: function (data) {
                    $('.modal').html(data);
                    $('.modal').modal("show");
                }
            })
        });
    </script>
@endsection
