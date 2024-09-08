
<div class="col-md-6">
    <div class="col-12 border-5 border-start  border-success ">
        <div class="py-2 ps-3 fw-semibold ">আইন-আদালত</div>
    </div>
    <div class="d-flex border-md-start  border-success  flex-wrap">
        <div class="col-md-6">
            @foreach($law_2 as $news)
            <div class="px-2 col-12 ">
                <a href="{{ route('news_details', $news->slug)}}">
                    <div class="row py-2">
                        <div class="col-6">
                            <h4 class="title fs-6">
                                {{ limitText($news->news_headline, 150) }}...
                            </h4>
                            <p class="text-danger">বিস্তারিত...</p>
                        </div>
                        <div class="col-6 d-flex">
                            <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->news_headline}}">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <a href="{{ route('news_details', $law_1->slug)}}">
                <div class="d-flex col-12 my-2">
                    @if($law_1->news_title_image)
                        <img class="col-12" src="{{ asset('backend/images/news-himages/'.$law_1->news_title_image) }}" alt="{{$law_1->news_headline}}">
                    @endif
                </div>
                <div>
                    <p class="title h4">
                        @if($law_1->news_headline)
                            {{$law_1->news_headline}}
                        @endif
                    </p>
                    <p class="seb-slug fs-6">
                        @if($law_1->news_body)
                        {{ limitText($law_1->news_body, 200) }}...
                        @endif
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>