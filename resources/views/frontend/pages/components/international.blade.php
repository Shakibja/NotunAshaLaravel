
<div class="col-md-9">
    <div class="col-12 d-flex ps-2 me-md-2">
        <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-success">আন্তর্জাতিক</div>
    </div>
    <div class="d-flex flex-wrap mt-2">
        <div class="col-md-6 d-md-flex">
            <div class="col-md-6">
                @foreach($international_2 as $news)
                <div class="px-2 col-12">
                    <a class=" py-2" href="{{ route('news_details', $news->slug)}}">
                        <div class="col-12 d-flex">
                            <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="news">
                        </div>
                        <div class="col-12">
                            <h2 class="title py-2 fs-6">
                                {{$news->news_headline}}
                            </h2>
                            <p class="text-danger">বিস্তারিত...</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="col-md-6">
                @foreach($international_3 as $news)
                <div class="row px-1">
                    <div class="col-md-12 pt-2">
                        <h2 class="fs-6">
                            <a class="title h7" href="{{ route('news_details', $news->slug)}}">{{$news->news_headline}}</a>
                        </h2>
                        <hr>
                    </div>
                    {{-- <div class="quickPostSectionItem ">
                        <ul class="list-group">
                            <ul class="list-group bg-transparent">
                                <li class="list-group-item">
                                    
                                </li>
                            </ul>
                        </ul>
                    </div> --}}
                </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-6 px-2">
            <a href="{{ route('news_details', $international_1->slug)}}">
                <div class="d-flex col-12 my-2">
                    @if($international_1->news_title_image)
                        <img class="col-12" src="{{asset('backend/images/news-himages/'.$international_1->news_title_image)}}" alt="{{ $international_1->news_headline }}">
                    @endif
                </div>
                <div>
                    <p class="title h4">
                        @if($international_1->news_headline)
                            {{$international_1->news_headline}}
                        @endif
                    </p>
                    <p class="seb-slug fs-6">
                        @if($international_1->news_body)
                        {{ limitText($international_1->news_body, 600) }}...
                        @endif
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>