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
          <p class="mg-b-0">The Daily Notun Asha Multimedia / Videos</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('add_multimedia_page') }}" class="mr-5 btn btn-info">Add Multimedia</a>
    </div>
  </div>

    <div class="br-pagebody">
      <div class="mt-5 container">
        <div class="row">
          <div class="col-md-12 border shadow-sm py-3">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Title</th>
                      {{-- <th>Video</th> --}}
                      {{-- <th>Description</th> --}}
                      <th>Embeded Code</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                @foreach ($multimedia as $multimedia)
                    <tr>
                      <td>{{$multimedia->id }}</td>
                      <td>{{ $multimedia->video_title }}</td>
                      {{-- <td>
                        <iframe class="muitimedia-1"  height="150" src="https://www.youtube.com/embed/{{$multimedia->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                      </td> --}}
                      {{-- <td>{{ $multimedia->video_description }}</td>  --}}
                      {{-- <td>হ্যাপি হোম অ্যান্ড হেলথকেয়ার প্রকাশনী কর্তৃক প্রকাশিত লেখক ও গবেষক কর কমিশনার আ স ম ওয়াহিদুজ্জামানের ছয়টি স্বাস্থ্য বিষয়ক গ্রন্থের মোড়ক উন্মোচন অনুষ্ঠান ধানমন্ডির ৩২ নম্বর সড়কের সান্তুর রেস্টুরেন্টে অনুষ্ঠিত হয়।</td>  --}}
                      <td>{{ $multimedia->video_link }}</td> 
                      
                      <td>
                        @if ($multimedia->video_status == 1)
                            <div class="badge badge-success">Published</div>
                            {{-- <i class="fas fa-check-square font-size-30 text-success"></i> --}}
                        @else
                          <div class="badge badge-warning">Drafted</div>
                            {{-- <button class="btn btn-sm btn-warning">Draft</button> --}}
                        @endif
                      </td>
                      <td>
                        {{-- <a href="" target=”_blank” class="my-1 btn btn-sm btn-info"><i class="fa fa-edit"></i></a> --}}
                        <button class="my-1 btn btn-sm btn-info" data-toggle="modal" data-target="#editCategoryModal{{$multimedia->id}}"><i class="fa fa-edit"></i></button>
                        <button class="my-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$multimedia->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>

                    <!-- Update Modal -->
                    <div class="modal fade" id="editCategoryModal{{$multimedia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <form action="{{route('update_multimedia',$multimedia->id)}}" method="post">
                            @csrf
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update Multimedia</h5>
                            </div>

                            <div class="modal-body">

                              <!--Video Title-->
                              <div class="form-group">
                                <label class="font-16-bold fw-bold">Video News Title <span class="fw-b text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter News Title" name="video_title" value="{{ $multimedia->video_title}}">
                                <x-input-error :messages="$errors->get('video_title')" class="mt-2 text-danger" />
                              </div>

                              <!--Description-->
                              <div class="form-group">
                                <label class="font-16-bold fw-bold">Video Description</label>
                                <input type="text" class="form-control" placeholder="Enter Description" name="video_description" value="{{ $multimedia->video_description}}">
                                <x-input-error :messages="$errors->get('video_description')" class="mt-2 text-danger" />
                              </div>

                              <!--Video Link-->
                              <div class="form-group">
                                <label class="font-16-bold fw-bold">Video Embeded Code <span class="fw-b text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter Video Link" name="video_link" value="{{ $multimedia->video_link}}">
                                <x-input-error :messages="$errors->get('video_link')" class="mt-2 text-danger" />
                              </div>
                              
                              <!--Video Status-->
                              <div class="form-group">
                                <label class="font-16-bold fw-bold">Video Status <span class="fw-b text-danger">*</span></label>
                                <select name="video_status" id="video_status" class="form-control">
                                  <option value="0">-----Select Status----</option>
                                  <option value="0" @if ($multimedia->video_status == 0)@selected(true) @endif>Draft</option>
                                  <option value="1" @if ($multimedia->video_status == 1)@selected(true) @endif>Published</option>
                                </select>
                                <x-input-error :messages="$errors->get('video_status')" class="mt-2 text-danger" />
                              </div>
                            </div>

                            <div class="modal-footer">
                              <button class="btn btn-success">Update</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteCategoryModal{{$multimedia->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation Message !</h5>
                          </div>
                          <div class="modal-body">Sure To Delete ?</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                            <a href="{{route('delete_multimedia', $multimedia->id)}}" class="btn btn-danger">Delete</a>
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
