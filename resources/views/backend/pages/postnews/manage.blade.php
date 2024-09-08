@extends('backend.mastering.master')
@section('info')
@php
use App\Models\Backend\Category;
use Carbon\Carbon;
@endphp

<title>All News|Dashboard </title>

<div class="br-mainpanel">
  <div class="br-pagetitle row">
    <div class="col-md-6 d-flex align-items-center">
      <i class="icon ion-ios-home-outline"></i>
      <div class="row">
        <div class="ml-4">
          <h4>The Daily Notun Asha</h4>
          <p class="mg-b-0">The Daily Notun Asha All News List</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 text-right">
      <a href="{{ route('add_news_page') }}" class="btn btn-info">Add News</a>
    </div>
  </div>

  <div class="br-pagebody">
    <div class="mt-5 container">
      <div class="row">
        <div class="col-md-12 border shadow-sm py-3">
          <table id="" class="table table-striped table-bordered" style="width:100%">
            {{-- example --}}
            <thead>
              <tr>
                <th>News ID No.</th>
                <th>Headline</th>
                <th>Category</th>
                <th>Author Name</th>
                <th>Post Date</th>
                <!--<th>Auth Email</th>-->
                <th>Specific Section</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($post_news_datas as $post_news_data)
              @php
              $eng = array('1','2','3','4','5','6','7','8','9','0');
              $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
              $date = Carbon::parse($post_news_data->created_at)->isoFormat('D MMMM YYYY');
              @endphp

              <tr>
                <td>{{$post_news_data->news_id }}</td>
                <td class="font-kalpurush">{{ $post_news_data->news_headline }}</td>
                <td class="font-kalpurush">
                  @php
                  $categogy = Category::where('category_slug', $post_news_data->category_slug)->first();
                  echo $categogy->category_name;
                  @endphp
                  {{-- {{ str_ireplace($cat_slug, $cat_name, $post_news_data->category_slug) }} --}}
                </td>
                <td class="font-kalpurush">{{optional($post_news_data->author)->author_name }}</td>
                <td class="font-kalpurush">{{ str_ireplace($eng, $bng, $date) }}</td>
                <td>
                  @if ($post_news_data->lead_news_status == 'true' && $post_news_data->tot_status == 'true' && $post_news_data->elected_status == 'true')
                  <span class="badge badge-success">All Section</span>
                  @elseif($post_news_data->lead_news_status == 'true' && $post_news_data->tot_status == 'true' && $post_news_data->elected_status == NULL)
                  <span class="my-1 badge badge-dark">লিড নিউজ</span>
                  <span class="my-1 badge badge-primary">আলোচনার শীর্ষে</span>
                  @elseif($post_news_data->lead_news_status == 'true' && $post_news_data->tot_status == NULL && $post_news_data->elected_status == 'true')
                  <span class="my-1 badge badge-dark">লিড নিউজ</span>
                  <span class="my-1 badge badge-warning">নির্বাচিত</span>
                  @elseif($post_news_data->lead_news_status == 'true' && $post_news_data->tot_status == NULL && $post_news_data->elected_status == NULL)
                  <span class="my-1 badge badge-dark">লিড নিউজ</span>
                  @elseif($post_news_data->lead_news_status == NULL && $post_news_data->tot_status == 'true' && $post_news_data->elected_status == NULL)
                  <span class="my-1 badge badge-primary">আলোচনার শীর্ষে</span>
                  @elseif($post_news_data->lead_news_status == NULL && $post_news_data->tot_status == 'true' && $post_news_data->elected_status == 'true')
                  <span class="my-1 badge badge-primary">আলোচনার শীর্ষে</span>
                  <span class="my-1 badge badge-warning">নির্বাচিত</span>
                  @elseif($post_news_data->lead_news_status == NULL && $post_news_data->tot_status == NULL && $post_news_data->elected_status == 'true')
                  <span class="my-1 badge badge-warning">নির্বাচিত</span>
                  @elseif($post_news_data->lead_news_status == NULL && $post_news_data->tot_status == NULL && $post_news_data->elected_status == NULL)
                  <span class="my-1 badge badge-primary">None</span>
                  @endif
                </td>
                <td>
                  @if ($post_news_data->news_status == '1')
                  <i class="fas fa-check-square font-size-30 text-success"></i>
                  @else
                  <button class="btn btn-sm btn-warning">Draft</button>
                  @endif
                </td>
                <td>
                  <a href="{{ route('edit_news_page', $post_news_data->slug) }}" target=”_blank” class="my-1 btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                  <button class="my-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteCategoryModal{{$post_news_data->slug}}"><i class="fa fa-trash"></i></button>
                </td>
              </tr>

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteCategoryModal{{$post_news_data->slug}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation Message !</h5>
                    </div>
                    <div class="modal-body">Sure To Delete ?</div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
                      <a href="{{route('delete_news', $post_news_data->slug)}}" class="btn btn-sm btn-danger">Delete</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </tbody>


            <tfoot>

            </tfoot>
          </table>

          <!-- Pagination Links -->
          <div class="d-flex justify-content-center">
            {{ $post_news_datas->links() }}
          </div>

        </div>
      </div>
    </div>
  </div>

  {{-- Footer --}}
  @include('backend.includes.footer')
</div>
@endsection