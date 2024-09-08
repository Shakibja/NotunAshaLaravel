@extends('backend.mastering.master')
@section('info')

    <title>Add E Paper Page</title>


    <div class="br-mainpanel">
        <div class="br-pagetitle row">
            <div class="col-md-6 d-flex">
                <i class="icon ion-ios-home-outline"></i>
                <div class="row">
                    <div class="ml-4">
                        <h4>The Daily Notun Asha</h4>
                        <p class="mg-b-0">Add E Paper Page</p>
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

                        <form action="{{ route('store_e_paper') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--First Row. It contains Headline, Keyword, Highlights, Body-->
                            <div class="row">
                                <div class="col-md-12">
                                    <!--News Title-->
                                    <div class="form-group">
                                        <label class="font-16-bold fw-bold">Date <span class="fw-b text-danger">*</span></label>
                                        <input type="date" class="form-control" required placeholder="Enter Date" name="date" :value="old('date')">
                                        <x-input-error :messages="$errors->get('date')" class="mt-2 text-danger" />
                                    </div>

                                    <div class="form-group">
                                        <label class="font-16-bold fw-bold">Page & Image <span class="fw-b text-danger">*</span>
                                        <!-- <span style="font-weight: bolder;color: red;font-size: 9px;padding-left: 10px;">All Image Width Must be 850px</span> -->
                                    </label><br>
                                        <div class="">
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number1" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image1">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number2" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image2">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number3" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image3">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number4" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image4">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number5" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image5">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number6" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image6">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number7"  placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image7">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <input type="text" class="form-control" name="page_number8" placeholder="Page Number">
                                                </div>
                                                <div class="col-6">
                                                    <input type="file" class="form-control" name="page_image8">
                                                </div>
                                            </div>

{{--                                            <div class="form-group row">--}}
{{--                                                <div class="row col-md-12">--}}
{{--                                                    <div class="col-12" id="nearest-place-box">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-11">--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-6">--}}
{{--                                                                        <input type="text" class="form-control" name="page_numbers[]" placeholder="Page Number" id="inputCategory">--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-6">--}}
{{--                                                                        <input type="file" class="form-control" name="page_images[]" id="inputCategory">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-1">--}}
{{--                                                                <button id="addFeaturesRow" type="button"--}}
{{--                                                                        class="btn btn-success btn-sm nearest-row-btn"><i--}}
{{--                                                                        class="fa fa-plus-square"></i></button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <div id="hidden-location-box" class="d-none pl-3 pr-3">--}}
{{--                                                    <div class="delete-dynamic-location">--}}
{{--                                                        <div class="row mt-2">--}}
{{--                                                            <div class="col-md-11">--}}
{{--                                                                <div class="row">--}}
{{--                                                                    <div class="col-6">--}}
{{--                                                                        <input type="text" class="form-control" name="page_numbers[]" placeholder="Page Number" id="inputCategory">--}}
{{--                                                                    </div>--}}
{{--                                                                    <div class="col-6">--}}
{{--                                                                        <input type="file" class="form-control" name="page_images[]" id="inputCategory">--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-1">--}}
{{--                                                                <button type="button"--}}
{{--                                                                        class="btn btn-danger btn-sm nearest-row-btn removeNearestPlaceRow">--}}
{{--                                                                    <i class="fa fa-trash"></i></button>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                            </div>
                                        </div>

                                    </div>
                                </div>



                            <!--Submit Button-->
                            <div class="row my-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success add-news">Add New</button>
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
