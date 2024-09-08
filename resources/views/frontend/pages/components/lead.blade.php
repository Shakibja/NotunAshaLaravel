@php
    function limitText($text, $limit) {
        // Remove any HTML tags from the text
        $text = strip_tags($text);
        // Check if the length of the text is already within the limit
        if (strlen($text) <= $limit) {
            return $text; // No need to truncate
        }
        // Find the last space within the limit
        $lastSpace = strrpos(substr($text, 0, $limit), ' ');
        // Truncate the text to the last space within the limit
        $truncatedText = substr($text, 0, $lastSpace);
    
        return $truncatedText;
    }
@endphp

<div class="col-lg-9">
    <div class="row">
        {{-- Second Lead --}}
        <div class="col-md-5">
            @foreach($second_lead as $news)
            <div class="row mb-2">
                <div class="col-md-6 d-flex">
                    <a href="{{ route('news_details', $news->slug)}}">
                        <img class="w-100" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}"
                        alt="{{$news->news_headline}}">
                    </a>
                </div>
                <div class="col-md-5">
                    <a href="{{ route('news_details', $news->slug)}}">
                        <h4 class="title  fs-6">{{$news->news_headline}}</h4>
                    </a>
                    <a href="{{ route('news_details', $news->slug)}}" class="text-danger">বিস্তারিত... </a>
                </div>
            </div>
            <hr class="">
            @endforeach
        </div>

        {{-- First Lead --}}
        <div class="col-md-7 border-start border-end">
            <a href="{{ route('news_details', $lead_news->slug)}}">
                <div class="img-height">
                    <picture>
                        @if($lead_news->news_title_image)
                            <img data-src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                            src="{{ asset('backend/images/news-himages/'.$lead_news->news_title_image)}}"
                            alt="{{ $lead_news->news_headline }}"
                            title="{{ $lead_news->news_headline }}"
                            class="img-fluid img100">
                        @endif
                    </picture>
                </div>
                <div class="desc mt-2">
                    <h1 class="title h4 mt-3">{{ $lead_news->news_headline }}</h1>
                    <div class="Brief " style="font-size: 14px;">
                        <p>{{ limitText($lead_news->news_body, 1500) }}...</p>
                    </div>
                    {{-- <span class="PublishTime "><i class="fa-regular fa-clock"></i> আপডেট  | ১৬:০৫</span> --}}
                </div>
            </a>
            <hr class="mb-0">
        </div>

        {{-- Lead --}}
        {{-- <div class="col-md-7">
            <div class="top-news">
                <a href="">
                    <div class="row">
                        <div class="col-lg-7 ">
                            <div class="py-2">
                            </div>
                        </div>
                        <div class="col-lg-5 order-lg-first">
                        </div>
                    </div>
                </a>
            </div>
            <div class="top-4-news mt-4">
                <div class="d-flex flex-wrap">
                    @foreach($second_lead as $news)
                    <div class="col-md-6 p-1 ">
                    </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
        {{-- Selected News after first 3--}}
        {{-- <div class="col-md-5">

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
    </div>

    {{-- Selected News first 3--}}
    <h3 class=" my-0 pb-0 fw-semibold">জাতীয়</h3>
    <div class="d-flex flex-wrap border-top  border-success border-2">
        @foreach($national as $news)
        <div class="col-md-4 col-12">
            <a href="{{ route('news_details', $news->slug)}}">
                <div class="me-2 my-2 ">
                    <div class="col-md-6 col-md-12 d-flex">
                        <img class="w-100" src="{{ asset('backend/images/news-himages/'.$news->news_title_image) }}" alt="{{ $news->news_headline }}">
                    </div>
                    <div class="col-md-6 col-md-12 py-2"> 
                        <h2 class="mt-2" style="font-size: 20px;">{{ limitText($news->news_body, 150) }}...</h2>
                        {{-- <h2 class="mt-2" style="font-size: 20px;">{{$news->news_headline}}</h2> --}}
                        <a href="{{ route('news_details', $news->slug)}}" class="text-danger">বিস্তারিত...</a>
                        {{-- <h2 class="mt-2" style="font-size: 20px;">{{$news->news_headline}}। <a href="" class="text-danger">বিস্তারিত...</a></h2> --}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>