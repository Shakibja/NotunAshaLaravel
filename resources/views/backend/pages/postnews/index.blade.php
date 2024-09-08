@extends('backend.mastering.master')
@section('info')

<title>Add News</title>


<div class="br-mainpanel">
  <div class="br-pagetitle row">
    <div class="col-md-6 d-flex align-items-center">
      <i class="icon ion-ios-home-outline"></i>
      <div class="row">
        <div class="ml-4">
          <h4>The Daily Notun Asha</h4>
          <p class="mg-b-0">Add News</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('manage_news_page') }}" class="btn btn-info">View All News</a>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="container">
      <div class="row">
        <div class="col-md-12 border shadow-sm p-4">
          <x-auth-session-status class="mb-4" :status="session('status')" />
          <form action="{{ route('store_news')}}" method="post" enctype="multipart/form-data">
            @csrf
            <!--First Row. It contains Headline, Keyword, Highlights, Body-->
            <div class="row">
              <div class="col-md-12">
                <!--News Headline-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold">News Head Line <span class="text-danger fw-bold">*</span></label>
                  <input type="text" class="form-control" placeholder="Enter News Headline"
                  name="news_headline" :value="old('news_headline')" required>
                  <x-input-error :messages="$errors->get('news_headline')" class="mt-2 text-danger" />
                </div>
                <!--News Shoulder-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold">News Sub-heading</label>
                  <input type="text" class="form-control" placeholder="Enter News Shoulder"
                  name="news_shoulder" :value="old('news_shoulder')">
                  <x-input-error :messages="$errors->get('news_shoulder')" class="mt-2 text-danger" />
                </div>
                <!--News Keywords-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold">News Key Words</label>
                  <input type="text" class="form-control" placeholder="Enter News Key Words" 
                  name="news_keywords" :value="old('news_keywords')" >
                  <x-input-error :messages="$errors->get('news_keywords')" class="mt-2 text-danger" />
                </div>
                <!--News Highlights-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold" for="news_highlights">News Highlights</label>
                  <textarea id="newsHighlightEditor" name="news_highlights" class="ckeditor form-control"  cols="30" rows="5" ></textarea>	
                  <x-input-error :messages="$errors->get('news_highlights')" class="mt-2 text-danger" />
                </div>
                <!--News Body-->
                <div class="form-group">
                  <label class="font-16-bold fw-bold" for="news_body">News Body <span class="text-danger fw-bold">*</span></label>
                  <textarea id="newsBodyEditor" name="news_body" class="ckeditor form-control"  cols="30" rows="2" ></textarea>	
                  <x-input-error :messages="$errors->get('news_body')" class="mt-2 text-danger" />
                </div>
              </div>
            </div>

            <!--Second Row. It contains News Category, Headline Image, Image courtecy-->
            <div class="row">
              <!--News Category-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">News Category <span class="text-danger fw-bold">*</span></label>
                  <select name="category_slug" id="category_slug" class="form-control" @required(true)>
                    <option value="">Select Category</option>
                    @foreach ($news_category as $news_category)
                      <option value="{{ $news_category->category_slug }}">{{$news_category->category_name}}</option>
                    @endforeach
                  </select>
                  <x-input-error :messages="$errors->get('news_category')" class="mt-2 text-danger" />
                </div>
              </div>
              <!--Headline Image-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="font-16-bold fw-bold" >News Headline Image <span class="text-danger fw-bold">*</span></label>
                  <input type="file" class="form-control"  name="news_title_image" :value="old('news_title_image')" @required(true)>
                  <x-input-error :messages="$errors->get('news_title_image')" class="mt-2 text-danger" />
                </div>
              </div>
              <!--Headline Image Courtecy-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Title Image Courtecy <span class="text-danger fw-bold">*</span></label>
                  <input type="text" class="form-control"  name="title_image_courtecy" 
                  placeholder="Title Image Courtecy" :value="old('title_image_courtecy')" required>
                  <x-input-error :messages="$errors->get('title_image_courtecy')" class="mt-2 text-danger" />
                </div>
              </div>
            </div>

            <!--Third Row. It contains Author Name, Inner Image, Inner Image courtecy-->
            <div class="row">
              <!--Author Name-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Author Name <span class="text-danger fw-bold">*</span></label>
                  <select name="author_id" id="author_id" class="form-control" required>
                    <option value="">Select Author</option>
                    @foreach ($news_author as $news_author)
                      <option value="{{ $news_author->author_id }}">{{$news_author->author_name}}</option>
                    @endforeach
                  </select>
                  <x-input-error :messages="$errors->get('author_id')" class="mt-2 text-danger" />
                </div>
              </div>
              <!--Inner Image-->
              <div class="col-md-4 d-none">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Inner News Image</label>
                  <input type="file" class="form-control"  name="inner_news_image" :value="old('inner_news_image')">
                  <x-input-error :messages="$errors->get('inner_news_image')" class="mt-2 text-danger" />
                </div>
              </div>
              <!--Inner Image Courtecy-->
              <div class="col-md-4 d-none">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Inner Image Courtecy</label>
                  <input type="text" class="form-control"  name="inner_image_courtecy" placeholder="Inner Image Courtecy" :value="old('inner_image_courtecy')">
                  <x-input-error :messages="$errors->get('inner_image_courtecy')" class="mt-2 text-danger" />
                </div>
              </div>
            </div>

            <!--Fourth Row. It contains Inner Image Position, In which section News Will be show-->
            <div class="row">
              <!--Inner Image Position-->
              <div class="col-md-4 d-none">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Inner Image Position</label>
                  <input type="number" class="form-control"  name="inner_image_para_no" placeholder="After Paragraph No." :value="old('inner_image_para_no')"  min="0">
                  <x-input-error :messages="$errors->get('inner_image_para_no')" class="mt-2 text-danger" />
                </div>
              </div>
              <!--News Status-->
              <div class="col-md-4">
                <div class="form-group">
                  <label class="font-16-bold fw-bold">Select News Status <span class="text-danger fw-bold">*</span></label>
                  <select name="news_status" id="news_status" class="form-control" required>
                    <option>Select Status</option>
                    <option value="1">Published</option>
                    <option value="0">Draft</option>
                  </select>
                  <x-input-error :messages="$errors->get('news_status')" class="mt-2 text-danger" />
                </div>
              </div>
            </div>

            <!--6th Row: Submit Button-->
            <div class="row mt-3">
              <div class="col-md-4">
                <div class="form-group row">
                  <div class="col-md-2 px-0">
                    <input type="checkbox" name="lead_news_status" id="lead_news_status" value="1" class="ml-1 form-control form-control-sm">
                  </div>
                  <div class="col-md-10">
                    <label for="lead_news_status" class="ml-1 font-16-bold fw-bold">লিড নিউজ</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group row">
                  <div class="col-md-2 px-0">
                    <input type="checkbox" name="tot_status" id="tot_status" value="1" class="ml-1 form-control form-control-sm">
                  </div>
                  <div class="col-md-10">
                    <label for="tot_status" class="ml-1 font-16-bold fw-bold">আলোচনার শীর্ষে</label>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group row">
                  <div class="col-md-2 px-0">
                    <input type="checkbox" name="elected_status" id="elected_status" value="1" class="ml-1 form-control form-control-sm">
                  </div>
                  <div class="col-md-10">
                    <label for="elected_status" class="ml-1 font-16-bold fw-bold">নির্বাচিত</label>
                  </div>
                </div>
              </div>
            </div>

            <!--6th Row: Submit Button-->
            <div class="row my-3">
              <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-success add-news">Add News</button>
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
