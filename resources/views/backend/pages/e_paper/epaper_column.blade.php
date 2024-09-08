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
                    <form action="{{ route('store_epaper_column') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!--First Row. It contains Headline, Keyword, Highlights, Body-->
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- <label class="font-16-bold fw-bold">Height <span class="fw-b text-danger">*</span></label> -->
                                        <input type="hidden" class="form-control" name="height" placeholder="Page Number">

                                    </div>


                                    <div class="col-md-3">
                                        <!-- <label class="font-16-bold fw-bold">Width <span class="fw-b text-danger">*</span></label> -->
                                        <input type="hidden" class="form-control" name="width" placeholder="Page Number">

                                    </div>


                                    <div class="col-md-3">
                                        <!-- <label class="font-16-bold fw-bold">Top <span class="fw-b text-danger">*</span></label> -->
                                        <input type="hidden" class="form-control" name="top" placeholder="Page Number">

                                    </div>

                                    <div class="col-md-3">
                                        <!-- <label class="font-16-bold fw-bold">Bottom <span class="fw-b text-danger">*</span></label> -->
                                        <input type="hidden" class="form-control" name="left" placeholder="Page Number">

                                    </div>
                                </div>

                                <style>
                                    #e-paper {
                                        position: relative;
                                        /* overflow-y: scroll; */
                                        /* border: 1px solid #ccc; */
                                        margin-bottom: 20px;
                                    }

                                    .news-item {
                                        position: absolute;
                                        z-index: 1;
                                        transition: border-color 0.3s, background-color 0.3s;
                                    }

                                    .news-item:hover {
                                        border-color: red;
                                        background-color: rgba(255, 0, 0, 0.2);
                                    }

                                    .hover-preview {
                                        position: absolute;
                                        display: none;
                                        z-index: 2;
                                        border: 2px solid #000;
                                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                                    }
                                </style>

                                <div id="e-paper">
                                    <p><img id="previewimage1" src="{{ asset('backend/images/e-paper-page/' . $page->page_image) }}" style="width: 850px;" /></p>

                                    @foreach($e_paper_column as $item)
                                    <div class="news-item" style="top: {{ $item->top }}; left: {{ $item->bottom }};width: {{ $item->width }}; height: {{ $item->height }};" onmouseover="showHoverPreview('{{ $item->page_number }}_{{ $item->column_number }}')" onmouseout="hideHoverPreview('{{ $item->page_number }}_{{ $item->column_number }}')"></div>
                                    @endforeach
                                </div>
                            </div>

                            <script>
                                function showHoverPreview(id) {
                                    var preview = document.getElementById(id);
                                    if (preview) {
                                        preview.style.display = 'block';
                                    }
                                }

                                function hideHoverPreview(id) {
                                    var preview = document.getElementById(id);
                                    if (preview) {
                                        preview.style.display = 'none';
                                    }
                                }
                            </script>
                            <div class="col-md-2"></div>

                            <div class="col-md-12">
                                <!--News Title-->
                                <div class="form-group">
                                    <label class="font-16-bold fw-bold">Date <span class="fw-b text-danger">*</span></label>
                                    <input type="date" class="form-control" required placeholder="Enter Date" name="date" :value="old('date')">
                                    <x-input-error :messages="$errors->get('date')" class="mt-2 text-danger" />
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="font-16-bold fw-bold">Page Number <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="page_number" placeholder="Page Number" value="{{ $page->page_number }}" readonly>
                                    </div>


                                    <div class="col-md-6">
                                        <label class="font-16-bold fw-bold">Column <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="column_number" placeholder="Column Number">

                                    </div>
                                </div>


                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Height <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="height1" placeholder="Height" readonly>
                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Width <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="width1" placeholder="Width" readonly>
                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Top <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="top1" placeholder="Top" readonly>

                                    </div>


                                    <div class="col-md-3">
                                        <label class="font-16-bold fw-bold">Bottom <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="left1" placeholder="Bottom" readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="font-16-bold fw-bold">Desc <span class="fw-b text-danger">*</span></label>
                                        <input type="text" class="form-control" name="desc" placeholder="Page Number">
                                    </div>

                                    <div class="col-md-6">
                                        <label class="font-16-bold fw-bold">Column Image <span class="fw-b text-danger">*</span></label>
                                        <input type="file" class="form-control image" name="profile_image">
                                    </div>

                                    <div class="col-md-12">
                                        <p><img id="previewimage" style="display:none;" /></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Submit Button-->
                        <div class="row my-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success add-news ">Add New</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    @include('backend.includes.footer')
</div>


@endsection