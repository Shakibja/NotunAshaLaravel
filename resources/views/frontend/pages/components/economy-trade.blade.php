<section class="economics py-1 my-1 container border-1 border-top">
    <div class="d-md-flex">

        <!-- অর্থ ও বাণিজ্য লিড-->
        <div class="col-md-9">
            <div class="col-12 d-flex ps-2">
                <div class="pt-1 pe-5  fw-semibold border-2 border-bottom  border-success  ">অর্থ ও বাণিজ্য</div>
            </div>
            <div class="d-flex flex-wrap mt-0">
                @foreach($economics_1 as $news)
                <div class="col-md-4">
                    <a href="{{ route('news_details', $news->slug)}}">
                        <div class="me-2 my-2 col-12 col-md-12 d-flex flex-md-column">
                            <div class="col-6 col-md-12 d-flex p-2">
                                <img class="w-100" src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}" alt="{{$news->news_headline}}">
                            </div>
                            <div class="col-6 col-md-12 mx-md-2 px-2 bg">
                                <div class=" col-md-12 title my-2 ">
                                    <h2 style="font-size: 20px;">
                                        {{$news->news_headline}}
                                    </h2>
                                </div>
                                <div class=" col-md-12 seb-slug fs-6">
                                    {{ limitText($news->news_body, 300) }}...
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>

        <!-- After Top 3 -->
        <div class="col-md-3">
            <div class="col-md-12 ">
                <div class="quickPostSectionItem ">
                    <ul class="list-group bg-transparent">
                        @foreach($economics_2 as $news)
                        <li class="list-group-item">
                            <a class="title fs-6" href="{{ route('news_details', $news->slug)}}">{{$news->news_headline}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>