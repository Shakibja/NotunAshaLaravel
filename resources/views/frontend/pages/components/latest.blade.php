<div class="col-md-3">

    {{--    e paper--}}
    <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
        <div class="d-flex align-items-center justify-content-between col-12 py-2">
            <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
            <p class="flex-grow-1 my-auto">ই-পেপার</p>
        </div>
    </div>
    <div class="mt-4">

        <form action="{{route('home')}}" method="GET">
            <div class="row">
                <div class="col-9">
                    <input type="date" name="date" id="e_paper_date" value="{{isset($date)?$date:''}}" class="form-control">
                </div>
                <div class="col-3">
                    <button type="submit" id="e_paper_search_btn" class="btn btn-success"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="quickPostSectionItem bg-transparent my-3">
        <ul class="list-group bg-transparent">
            <ul class="list-group mb-3" style="overflow: scroll; width: 100%;height: 450px;" id="e_paper_field">
                @foreach($e_paper_pages as $page)
                    <a href="{{ asset('backend/images/e-paper-page/'.$page->page_image) }}" title="" data-effect="fade"  data-zoomable="true" data-draggable="true"
                       class="glightbox preview-link" id="glightbox">
                        <img src="{{ asset('backend/images/e-paper-page/'.$page->page_image) }}" class="img-fluid gallery-photo" alt="">
                    </a>
                @endforeach
            </ul>
        </ul>
    </div>
{{--    <div class=" special-section ">--}}
{{--        <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">--}}
{{--            <div class="d-flex align-items-center justify-content-between col-12 py-2">--}}
{{--                <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>--}}
{{--                <p class="flex-grow-1 my-auto">সর্বশেষ</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="quickPostSectionItem bg-transparent my-3">--}}
{{--            <ul class="list-group bg-transparent">--}}
{{--                <ul class="list-group">--}}
{{--                    @foreach($latest as $news)--}}
{{--                        <li class="list-group-item">--}}
{{--                            <a class="title h7" href="#">{{$news->news_headline}}</a>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>
