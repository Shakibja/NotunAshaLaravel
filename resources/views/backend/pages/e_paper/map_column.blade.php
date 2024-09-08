@extends('backend.mastering.master')
@section('info')
<link rel="stylesheet" href="{{ asset('css/imgareaselect.css') }}" />
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
            <a href="{{ route('manage_e_paper_column') }}" class="btn btn-info">View All</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border shadow-sm p-4">
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form action="{{ route('update_epaper_map', $page_info->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--First Row. It contains Headline, Keyword, Highlights, Body-->
                        <div class="row">
                            <div class="col-md-12">
                                <!--News Title-->
                                <div class="form-group">
                                    <label class="font-16-bold fw-bold">Date <span class="fw-b text-danger">*</span></label>
                                    <input type="date" class="form-control" required placeholder="Enter Date" name="map_date" value="{{ old('map_date',isset($page_info) ? $page_info->date : '' )}}">
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="font-16-bold fw-bold">Map Page Number <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="map_page_number" placeholder="Map Page Number" value="{{ old('map_page_number',isset($page_info) ? $page_info->map_page_number : '' )}}">

                                    </div>


                                    <div class="col-md-4">
                                        <label class="font-16-bold fw-bold">Map Column Number<span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="map_column_number" placeholder="Map Column Number">

                                    </div>

                                    <div class="col-md-4">
                                        <label class="font-16-bold fw-bold">Column Image <span class="fw-b text-danger">*</span></label> <br>
                                        @if (isset($page_info) && $page_info->column_image != null)
                                                <a
                                                    href="{{ asset('backend/images/e-paper-page/'.$page_info->column_image) }}" style="font-weight: bolder;">Column Image Show</a>
                                            @endif
                                    </div>



                                </div>

                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Height <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="height2" placeholder="Page Number">

                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Width <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="width2" placeholder="Page Number">

                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Top <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="top2" placeholder="Page Number">

                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Bottom <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="left2" placeholder="Page Number">

                                    </div>



                                </div>


                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <label class="font-16-bold fw-bold">Map Image <span class="fw-b text-danger">*</span></label>
                                        <input type="file" class="form-control image2" name="map_image">

                                    </div>

                                    <div class="col-md-12">
                                        <p><img id="previewimage2" style="display:none;" /></p>

                                    </div>



                                </div>




                            </div>


                        </div>



                        <!--Submit Button-->
                        <div class="row my-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success add-news ">Map</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    jQuery(function($) {
        var p = $("#previewimage2");
 
        $("body").on("change", ".image2", function(){
            var imageReader = new FileReader();
            imageReader.readAsDataURL(document.querySelector(".image2").files[0]);
 
            imageReader.onload = function (oFREvent) {
                p.attr('src', oFREvent.target.result).fadeIn();
            };
        });
 
        $('#previewimage2').imgAreaSelect({
            onSelectEnd: function(img, selection) {
                $('input[name="top1"]').val(selection.y1);
                $('input[name="left1"]').val(selection.x1);
                $('input[name="height1"]').val(selection.height);
                $('input[name="width1"]').val(selection.width);
            }
        });
    });
</script>



    @include('backend.includes.footer')
</div>


@endsection