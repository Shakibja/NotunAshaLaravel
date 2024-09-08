@extends('backend.mastering.master')
@section('info')
@php
  use App\Models\Backend\Category;
  use Carbon\Carbon;
@endphp

<title>Banner View|Dashboard </title>

<div class="br-mainpanel">
  <div class="br-pagetitle row">
    <div class="col-md-6 d-flex align-items-center">
      <i class="icon ion-ios-home-outline"></i>
      <div class="row">
        <div class="ml-4">
          <h4>The Daily Notun Asha</h4>
          <p class="mg-b-0">The Daily Notun Asha All Advertise List</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('add_banner_page') }}" class="btn btn-info">Add Advertise</a>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="mt-5 container">
      <div class="row">
        <div class="col-md-12 border shadow-sm py-3">
          <table id="" class="table table-striped table-bordered table-responsive" style="width:100%">
            {{-- example --}}
              <thead>
                  <tr>
                    <th>News Banner No.</th>
                    <th>Post Date</th>
                    <th>Main Banner 1</th>
                    <th>Main Right Banner 1</th>
                    <th>Main Right Banner 2</th>
                    <!--<th>Auth Email</th>-->
                    <th>Main Banner 2</th>
                    <th>Main Banner 3</th>
                    <th>Details Page Banner 1</th>
                    <th>Details Page Banner 2</th>
                    <th>Details Page Banner 3</th>
                    <th>News Category Banner 1</th>
                    <th>News Category Banner 2</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
              </thead>
              
              <tbody>
                  @foreach ($banner_view as $banner_view_data)
                    @php
                      $eng = array('1','2','3','4','5','6','7','8','9','0');
                      $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
                      $date = Carbon::parse($banner_view_data->date)->isoFormat('D MMMM YYYY');
                    @endphp
                    
                    <tr>
                        <td>{{$banner_view_data->id }}</td>
                        <td>{{ str_ireplace($eng, $bng, $date) }}</td>
                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_1) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_1) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_right_banner_1) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_right_banner_1) }}" style="width: 100px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_right_banner_2) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_right_banner_2) }}" style="width: 100px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_2) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_2) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_3) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->m_banner_3) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_1) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_1) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_2	) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_2	) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_3	) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->d_banner_3	) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->nc_banner_1	) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->nc_banner_1	) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>

                        <td>
                            <a href="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->nc_banner_2	) }}">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_view_data->nc_banner_2	) }}" style="width: 150px;height: 80px; " />
                            </a>
                        </td>
                        
                       
                        
                        <td>
                          @if ($banner_view_data->status == 'A')
                              <i class="fas fa-check-square font-size-30 text-success"></i>
                          @else
                              <button class="btn btn-sm btn-warning">Draft</button>
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('edit_banner', $banner_view_data->id) }}" target=”_blank” class="my-1 btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                          <button class="my-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$banner_view_data->id}}"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                    
                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteCategoryModal{{$banner_view_data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirmation Message !</h5>
                                </div>
                                <div class="modal-body">Sure To Delete ?</div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
                                  <a href="{{route('delete_banner', $banner_view_data->id)}}" class="btn btn-sm btn-danger">Delete</a>
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
