@extends('backend.mastering.master')
@section('info')

<title>Add Multimedia</title>


<div class="br-mainpanel">
  <div class="br-pagetitle row">
    <div class="col-md-6 d-flex">
      <i class="icon ion-ios-home-outline"></i>
      <div class="row">
        <div class="ml-4">
          <h4>The Daily Notun Asha</h4>
          <p class="mg-b-0">Add Multimedia</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('manage_multimedia_page') }}" class="btn btn-info">View All</a>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="container">
      <div class="row">
        <div class="col-md-12 border shadow-sm p-4">
          <x-auth-session-status class="mb-4" :status="session('status')" />
          
          <form action="{{ route('store_multimedia') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!--First Row. It contains Headline, Keyword, Highlights, Body-->
            <div class="row">
              <div class="col-md-12">
                <!--News Title-->
                <div class="form-group">
                    <label class="font-16-bold fw-bold">Video News Title <span class="fw-b text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Enter News Title" name="video_title" :value="old('video_title')">
                    <x-input-error :messages="$errors->get('video_title')" class="mt-2 text-danger" />
                </div>

                <!--Description-->
                <div class="form-group">
                    <label class="font-16-bold fw-bold">Video Description</label>
                    <input type="text" class="form-control" placeholder="Enter Description" name="video_description" :value="old('video_description')">
                    <x-input-error :messages="$errors->get('video_description')" class="mt-2 text-danger" />
                </div>
                <div class="row">
                  <div class="col-md-6">
                    
                <!--Video Link-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Video Embeded Code <span class="fw-b text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter Video Link" name="video_link" :value="old('video_link')">
                  <x-input-error :messages="$errors->get('video_link')" class="mt-2 text-danger" />
                </div>
                  </div>
                  <div class="col-md-6">
                    <!--Video Status-->
                    <div class="form-group">
                      <label class="font-16-bold fw-bold">Video Status <span class="fw-b text-danger">*</span></label>
                      <select name="video_status" id="video_status" class="form-control">
                        <option value="false">-----Select Status----</option>
                        <option value="1">Published</option>
                        <option value="0">Draft</option>
                      </select>
                      <x-input-error :messages="$errors->get('video_status')" class="mt-2 text-danger" />
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!--Submit Button-->
            <div class="row my-3">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success add-news">Add Multimedia</button>
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
