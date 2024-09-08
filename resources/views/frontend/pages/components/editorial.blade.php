<div class="col-lg-3 d-flex flex-column">
    <div class="row">
        <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->m_right_banner_1) }}" alt="">
    </div>
    

    <div class=" special-section mt-3">
        <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
            <div class="d-flex align-items-center justify-content-between col-12 py-2">
                <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
                <p class="flex-grow-1 my-auto">সর্বশেষ</p>
            </div>
        </div>
        <div class="quickPostSectionItem bg-transparent my-3">
            <ul class="list-group bg-transparent">
                <ul class="list-group">
                    @foreach($latest as $news)
                        <li class="list-group-item">
                            <a class="title h7" href="{{ route('news_details', $news->slug)}}">{{$news->news_headline}}</a>
                        </li>
                    @endforeach
                </ul>
            </ul>
        </div>

    </div>


    <div class="row " style="margin-top: 50px;">
        <a href="https://techsolutionsbd.com/"><img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->m_right_banner_2) }}" alt="" style="width: 100%;"></a>
    </div>


    {{-- <div class=" special-section ">
        <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
            <div class="d-flex align-items-center justify-content-between col-12 py-2">
                <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
                <p class="flex-grow-1 my-auto">সম্পাদকীয়</p>
            </div>
        </div>
        <div class="quickPostSectionItem bg-transparent">
            <ul class="list-group bg-transparent">
                <li class="list-group-item ">
                    <a href="#">
                        <div class="d-flex col-12 my-2">
                        @if($editorial_1->news_title_image)
                        <img class="col-12" src="{{ asset('backend/images/news-himages/'.$editorial_1->news_title_image) }}" alt="editorial">
                        @endif

                        </div>
                        <h3 class="h5">
                            @if($editorial_1->news_headline)
                                {{$editorial_1->news_headline}}
                            @endif
                        </h3>
                    </a>
                </li>
                @foreach($editorial_2 as $news)
                <li class="list-group-item">
                    <a href="#">
                        <div class="d-flex">
                            <div class="d-flex col-5">
                                <img class="col-12" src="{{asset('backend/images/news-himages/'.$news->news_title_imag1e)}}" alt="editorial">
                            </div>
                            <h4 class=" title col-7 ps-1 fs-5">
                                {{ $news->news_headline }}
                            </h4>
                        </div>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div> --}}
    {{-- <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
        <div class="d-flex align-items-center justify-content-between col-12 py-2">
            <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
            <p class="flex-grow-1 my-auto">নির্বাচিত</p>
        </div>
    </div>
    <div class="quickPostSectionItem">
        <ul class="list-group">
            @foreach($selected_2 as $news)
            <li class="list-group-item">
                <a class="title" href="#">{{$news->news_headline}}</a>
            </li>
            @endforeach
        </ul>
    </div> --}}
</div>
{{-- <div class="col-md-4 ">
    <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
        <div class="d-flex align-items-center justify-content-between col-12 py-2">
            <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
            <p class="flex-grow-1 my-auto">নির্বাচিত</p>
        </div>
    </div>
    <div class="quickPostSectionItem ">
        <ul class="list-group">
            @foreach($selected_2 as $news)
            <li class="list-group-item">
                <a class="title" href="#">{{$news->news_headline}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div> --}}
