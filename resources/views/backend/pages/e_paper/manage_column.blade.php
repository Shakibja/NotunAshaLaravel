@extends('backend.mastering.master')
@section('info')

<title>All News|Dashboard </title>


<div class="br-mainpanel">
    <div class="br-pagetitle row">
        <div class="col-md-6 d-flex ">
            <i class="icon ion-ios-home-outline"></i>
            <div class="row">
                <div class="ml-4">
                    <h4>The Daily Notun Asha</h4>
                    <p class="mg-b-0">The Daily Notun Asha E Paper Pages</p>
                </div>
            </div>
        </div>
        {{--<div class="col-md-6 text-right">
            <a href="{{ route('epaper_column', ['date' => $e_paper_pages->date, 'page_number' => $e_paper_pages->page_number])}}" class="mr-5 btn btn-info">Add E Paper Column</a>
        </div>--}}
    </div>

    <div class="br-pagebody">
        <div class="mt-5 container">
            <div class="row">
                <div class="col-md-12 border shadow-sm py-3">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Page Number</th>
                                <th>Column Number</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($e_paper_pages as $data)
                            <tr>
                                <td>{{$data->id }}</td>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->page_number }}</td>
                                <td>{{ $data->column_number }}</td>
                                <td>
                                    <a href="{{ asset('backend/images/e-paper-page/'.$data->column_image) }}">
                                    <img src="{{ asset('backend/images/e-paper-page/'.$data->column_image) }}" height="80" width="80" alt="">

                                    </a>
                                </td>
                                <td>
                                    <!-- <a class="my-1 btn btn-sm btn-info" href="{{route('edit_e_paper',$data->id)}}"><i class="fa fa-edit"></i>
                                    </a> -->
                                    <a class="my-1 btn btn-sm btn-info" href="{{route('map_e_paper_column',$data->id)}}">Map
                                    </a>
                                    <button class="my-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$data->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteCategoryModal{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message
                                                !</h5>
                                        </div>
                                        <div class="modal-body">Sure To Delete ?</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <a href="{{route('delete_e_paper_column', $data->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('backend.includes.footer')
</div>
@endsection