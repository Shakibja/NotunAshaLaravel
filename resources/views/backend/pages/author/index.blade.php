@extends('backend.mastering.master')
@section('info')

<title>Author</title>


<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Author</h4>
      <p class="mg-b-0">The Daily Notun Asha Author's List</p>
    </div>
  </div>

    <div class="br-pagebody">

      <div class="container">
        <div class="row">
          <div class="col-md-12 border shadow-sm p-4">
              <form action="{{ route('store_author')}}" method="post" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fw-semibold">Author Name</label>
                    <input type="text" class="form-control" placeholder="Enter Author Name" name="author_name" :value="old('author_name')" required>
                    <x-input-error :messages="$errors->get('author_name')" class="mt-2 text-danger" />
                  </div>
                  <div class="form-group">
                    <label class="fw-semibold">Author Email</label>
                    <input type="email" class="form-control" placeholder="Enter Author Email" name="author_email" :value="old('author_email')" required>
                    <x-input-error :messages="$errors->get('author_email')" class="mt-2 text-danger" />
                  </div>
                  <button class="btn btn-success">Add Author</button>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fw-semibold">Author Phone Number</label>
                    <input type="text" class="form-control" placeholder="Enter Phone Number" name="author_phone_no" :value="old('author_phone_no')" required>
                    <x-input-error :messages="$errors->get('author_phone_no')" class="mt-2 text-danger" />
                  </div>
                  <div class="form-group">
                    <label class="fw-semibold">Select Author Status</label>
                    <select name="author_status" id="author_status" class="form-control">
                      <option>-----Select Status-----</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    <x-input-error :messages="$errors->get('author_status')" class="mt-2 text-danger" />
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>

      <div class="mt-5 container">
        <div class="row">
          <div class="col-md-12 border shadow-sm py-3">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>
                      <th>Serial No.</th>
                      <th>Author Name</th>
                      <th>Email</th>
                      <th>Phone No</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php $sl = 1; ?>
                @foreach ($author as $author)
                    <tr>
                      <td>{{ $sl }}</td>
                      <td>{{ $author->author_name }}</td>
                      <td>{{ $author->author_email }}</td>
                      <td>{{ $author->author_phone_no }}</td>
                      <td>
                        @if ($author->author_status == 1)
                          <div class="badge badge-success">Active</div>
                        @else
                          <div class="badge badge-warning">Inactive</div>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editAuthorModal{{$author->author_id}}">Edit</button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteAuthorModal{{$author->author_id}}">Delete</button>
                      </td>
                    </tr>
                    <?php $sl++; ?>

                    <!-- Update Modal -->
                    <div class="modal fade" id="editAuthorModal{{$author->author_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="{{route('update_author',$author->author_id)}}" method="post">
                            @csrf
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                          </div>
                          <div class="modal-body">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="fw-semibold">Author Name</label>
                                  <input type="text" class="form-control" name="author_name" value="{{$author->author_name}}" required>
                                  <x-input-error :messages="$errors->get('author_name')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group">
                                  <label class="fw-semibold">Author Email</label>
                                  <input type="email" class="form-control" name="author_email" value="{{$author->author_email}}" required>
                                  <x-input-error :messages="$errors->get('author_email')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group">
                                  <label class="fw-semibold">Author Phone Number</label>
                                  <input type="text" class="form-control" name="author_phone_no" value="{{$author->author_phone_no}}" required>
                                  <x-input-error :messages="$errors->get('author_phone_no')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group">
                                  <label class="fw-semibold">Select Author Status</label>
                                  <select name="author_status" id="author_status" class="form-control">
                                    <option>-----Select Status-----</option>
                                    <option value="1" @if ($author->author_status == 1)@selected(true) @endif>Active</option>
                                    <option value="0" @if ($author->author_status == 0)@selected(true) @endif>Inactive</option>
                                  </select>
                                  <x-input-error :messages="$errors->get('author_status')" class="mt-2 text-danger" />
                                </div>
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
                    <div class="modal fade" id="deleteAuthorModal{{$author->author_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sure To Delete ?</h5>
                          </div>
                          <div class="modal-body"></div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">No</button>
                            <a href="{{route('delete_author', $author->author_id)}}" class="btn btn-sm btn-danger">Yes</a>
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
