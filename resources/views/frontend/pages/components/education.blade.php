<div class="col-md-6">
    <div class="col-12 border-5 border-start  border-success ">
        <div class="py-2 ps-3 fw-semibold ">শিক্ষাঙ্গন</div>
    </div>
    <div class="d-flex border-md-start  border-success  flex-wrap">
        <div class="col-md-6">
            @foreach($education_2 as $news)
            <div class="px-2 col-12 ">
                <a class="row py-2" href="{{ route('news_details', $news->slug)}}">
                    <div class="col-6 d-flex">
                        <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->news_headline}}">
                    </div>
                    <div class="col-6">
                        <h2 class="title fs-6">
                            {{ limitText($news->news_headline, 150) }}...
                        </h2>
                        <p class="text-danger">বিস্তারিত...</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <a href="{{ route('news_details', $education_1->slug)}}">
                <div class="d-flex col-12 my-2">
                    @if($education_1->news_title_image)
                        <img class="col-12" src="{{asset('backend/images/news-himages/'.$education_1->news_title_image)}}" alt="{{$education_1->news_headline}}">
                    @endif
                </div>
                <div>
                    <p class="title h4">
                        @if($education_1->news_highlights)
                            {{$education_1->news_headline}}
                        @endif
                    </p>
                    <p class="seb-slug fs-6">
                        @if($education_1->news_body)
                        {{ limitText($education_1->news_body, 350) }}...
                        @endif
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>