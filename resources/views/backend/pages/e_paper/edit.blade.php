@extends('backend.mastering.master')
@section('info')

    <title>Edit E Paper Page</title>

    <div class="br-mainpanel">
        <div class="br-pagetitle row">
            <div class="col-md-6 d-flex">
                <i class="icon ion-ios-home-outline"></i>
                <div class="row">
                    <div class="ml-4">
                        <h4>The Daily Notun Asha</h4>
                        <p class="mg-b-0">Edit E Paper Page</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('manage_e_paper') }}" class="btn btn-info">View All</a>
            </div>
        </div>

        <div class="br-pagebody">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 border shadow-sm p-4">
                        <x-auth-session-status class="mb-4" :status="session('status')" />

                        <form action="{{ route('update_e_paper') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--First Row. It contains Headline, Keyword, Highlights, Body-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!--News Title-->
                                    <div class="form-group">
                                        <label class="font-16-bold fw-bold">Date <span class="fw-b text-danger">*</span></label>
                                        <input type="date" class="form-control" required placeholder="Enter Date" name="date" value="{{$date??old('date')}}">
                                        <x-input-error :messages="$errors->get('date')" class="mt-2 text-danger" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-16-bold fw-bold">Page & Image <span class="fw-b text-danger">*</span></label><br>
                                        <div class="">
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number1" value="{{isset($one)?$one->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image1">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number2" value="{{isset($two)?$two->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image2">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number3" value="{{isset($three)?$three->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image3">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number4" value="{{isset($four)?$four->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image4">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number5" value="{{isset($five)?$five->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image5">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number6" value="{{isset($six)?$six->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image6">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number7" value="{{isset($seven)?$seven->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image7">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number8" value="{{isset($eight)?$eight->page_number:null}}" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image8">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <!--Submit Button-->
                            <div class="row my-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success add-news">Update</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Footer --}}
        @include('backend.includes.footer')
    </div>


@endsection
