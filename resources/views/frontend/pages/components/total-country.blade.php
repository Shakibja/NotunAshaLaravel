<div class="col-md-9">
    <div class="col-12 d-flex ps-2">
        <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-success  ">সারাদেশ</div>
    </div>
    <div class="d-flex flex-wrap">
        @foreach($total_country as $news)
        <div class="col-md-4">
            <a href="{{ route('news_details', $news->slug)}}">
                <div class="me-2 my-2  col-12 col-md-12 d-flex flex-md-column ">
                    <div class="col-6 col-md-12 d-flex p-2">
                        <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{ $news->news_headline }}">
                    </div>
                    <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                        <div class=" col-md-12 title my-2 ">
                            <h2 style="font-size: 20px;">
                                {{ limitText($news->news_headline, 150) }}...
                            </h2>
                        </div>
                        <div class=" col-md-12 seb-slug fs-6" style="text-align: justify;">
                            {{ limitText($news->news_body, 300) }}...
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>