@extends('backend.mastering.master')
@section('info')
<title>Add Newspaper Banner</title>
<div class="br-mainpanel">
    <div class="br-pagetitle row">
        <div class="col-md-6 d-flex">
            <i class="icon ion-ios-home-outline"></i>
            <div class="row">
                <div class="ml-4">
                    <h4>The Daily Notun Asha</h4>
                    <p class="mg-b-0">Add Newspaper Banner</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 text-right">
            <a href="{{ route('banner_view') }}" class="btn btn-info">View All</a>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border shadow-sm p-4">
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    <form action="{{ route('banner_store') }}" method="post" enctype="multipart/form-data">
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

                                <div class="row">
                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Main Page Banner <span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="m_banner_1">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>

                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Main Page right Banner 1<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="m_right_banner_1">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 300px, Height: 250px)</p>
                                </div>
                                </div>


                                <div class="row mt-2">
                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Main Page right Banner 2<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="m_right_banner_2">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 265px, Height: 360px)</p>
                                </div>


                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Main Page Banner 2<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="m_banner_2">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>
                                </div>

                                <div class="row mt-3">
                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Main Page Banner 3<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="m_banner_3">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>

                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Detail Page Banner 1<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="d_banner_1">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>
                                </div>

                                <div class="row mt-3">
                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Detail Page Banner 2<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="d_banner_2">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>

                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">Detail Page Banner 3<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="d_banner_3">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>
                                </div>


                                <div class="row mt-3">
                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">News Category Page Banner 1<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="nc_banner_1">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
                                </div>

                                <div class="col-md-6">
                                <label class="font-16-bold fw-bold">News Category Page Banner 2<span class="fw-b text-danger">*</span></label>
                                <input type="file" class="form-control" name="nc_banner_2">
                                <p class="mt-2" style="font-weight: bolder;font-size: 14px;">(Width : 970px, Height: 80px)</p>
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