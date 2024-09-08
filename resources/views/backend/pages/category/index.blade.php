@extends('backend.mastering.master')
@section('info')

<title>Category</title>


<div class="br-mainpanel">
  <div class="br-pagetitle">
    <i class="icon ion-ios-home-outline"></i>
    <div>
      <h4>Category</h4>
      <p class="mg-b-0">The Daily Notun Asha News Category List</p>
    </div>
  </div>

    <div class="br-pagebody">
      <div class="container">
        <div class="row">
          <div class="col-md-12 border shadow-sm p-4">
              <form action="{{ route('store_category')}}" method="post" class="row">
                @csrf
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fw-semibold">Category Name</label>
                    <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name" :value="old('category_name')" required>
                    <x-input-error :messages="$errors->get('category_name')" class="mt-2 text-danger" />
                  </div>
                  <div class="form-group">
                    <label class="fw-semibold">Category Slug</label>
                    <input type="text" class="form-control" placeholder="Enter Category Slug" name="category_slug" :value="old('category_slug')" required>
                    <x-input-error :messages="$errors->get('category_slug')" class="mt-2 text-danger" />
                  </div>

                  
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="fw-semibold">Select Category Status</label>
                    <select name="category_status" id="category_status" class="form-control">
                      <option>-----Select Status-----</option>
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>
                    </select>
                    <x-input-error :messages="$errors->get('category_status')" class="mt-2 text-danger" />
                  </div>

                  <div class="form-group">
                    <label class="fw-semibold">Priority</label>
                    <input type="number" class="form-control" placeholder="Enter Category Slug" name="priority" :value="old('priority')" required>
                    <x-input-error :messages="$errors->get('priority')" class="mt-2 text-danger" />
                  </div>
                  
                </div>

                <div class="col-lg-12">
                <div class="text-center">
                    <label class="d-none">button</label>
                    <button class="mt-3 btn btn-success">Add Category</button>
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
                      <th>Category Name</th>
                      <th>Category Slug</th>
                      <th>Priority</th>
                      <th>Category Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php $sl = 1; ?>
                @foreach ($category as $category)
                    <tr>
                      <td>{{ $category->category_id }}</td>
                      <td>{{ $category->category_name }}</td>
                      <td>{{ $category->category_slug }}</td>
                      <td>{{ $category->priority }}</td>
                      <td>
                        @if($category->category_status == 1)
                        <div class="badge badge-success">Active</div>
                        @else
                        <div class="badge badge-warning">Inative</div>
                        @endif
                      </td>
                      <td>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editCategoryModal{{$category->category_id}}">Edit</button>
                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$category->category_id}}">Delete</button>
                      </td>
                    </tr>
                    <?php $sl++; ?>

                    <!-- Update Modal -->
                    <div class="modal fade" id="editCategoryModal{{$category->category_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="{{route('update_category',$category->category_id)}}" method="post">
                            @csrf
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="fw-semibold">Category Name</label>
                                    <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}" required>
                                    <x-input-error :messages="$errors->get('category_name')" class="mt-2 text-danger" />
                                  </div>
                                  <div class="form-group">
                                    <label class="fw-semibold">Category Slug</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Slug" name="category_slug"  value="{{$category->category_slug}}" required>
                                    <x-input-error :messages="$errors->get('category_slug')" class="mt-2 text-danger" />
                                  </div>
                                  <div class="form-group">
                                    <label class="fw-semibold">Select Category Status</label>
                                    <select name="category_status" id="category_status" class="form-control">
                                      <option>-----Select Status-----</option>
                                      <option value="1" @if ($category->category_status == 1)@selected(true) @endif>Active</option>
                                      <option value="0" @if ($category->category_status == 0)@selected(true) @endif>Inactive</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('category_status')" class="mt-2 text-danger" />
                                  </div>

                                  <div class="form-group">
                                    <label class="fw-semibold">Priority</label>
                                    <input type="text" class="form-control" placeholder="Enter Category Slug" name="priority"  value="{{$category->priority}}" required>
                                    <x-input-error :messages="$errors->get('priority')" class="mt-2 text-danger" />
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
                    <div class="modal fade" id="deleteCategoryModal{{$category->category_id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sure To Delete ?</h5>
                          </div>
                          <div class="modal-body"></div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">No</button>
                            <a href="{{route('delete_category', $category->category_id)}}" class="btn btn-sm btn-danger">Yes</a>
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
