@extends('frontend.mastering.master')
@section('page-content')
<?php 

  use Carbon\Carbon;
  use App\Models\Backend\Category;
  use App\Models\Backend\PostNews;

  $now = Carbon::now()->locale('bn');

  $dayInBangla = $now->isoFormat('dddd');
  $date = $now->isoFormat('D MMMM YYYY');
  $time = $now->isoFormat('A h:mm');

  $eng = array('1','2','3','4','5','6','7','8','9','0');
  $bng = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
  
  
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

?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="heading-title mt-4 my-3">
                    <a href="/latest/news">
                        <h1>নতুন আশা-নতুন খবর</h1>
                    </a>
                </div>
            </div>
        </div>
        <div class="DArchivePageSec">
            <div class="row" id="data-wrapper">
                @foreach($latestNews as $news)
                <div class="col-lg-6">
                    <div class="CatListNews  py-2 ">
                        <a
                            href="{{ route('news_details', $news->slug)}}">
                            <div class="row d-flex justify-content-end my-3">
                                <div class="col-md-6 col-12 position-relative mb-3">
                                    <div class="CatNameSP">{{$news->category->category_name}}</div>
                                    <div class="CatListhead">
                                        <h3 class="title">{{limitText($news->news_headline, 100)}}... &nbsp;&nbsp;</h3>
                                    </div>
                                    <div class="ListDesc fs-6 pb-2">
                                        <p>{{ limitText($news->news_body, 150) }}...</p>
                                    </div>
                                    <span class="publishTime fs-8 mt-3 position-absolute bottom-0">আপডেটঃ {{str_ireplace($eng, $bng, $news->created_at->isoFormat('D MMMM YYYY'))}} | {{str_ireplace($eng, $bng, $news->created_at->isoFormat('h:mm'))}}</span>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="img-box overflow-hidden">
                                        <picture>
                                            <img src="{{asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                            alt="{{$news->news_headline}} &nbsp;&nbsp;"
                                            title="{{$news->news_headline}} &nbsp;&nbsp;"
                                                class="img-fluid img100 rounded">
                                        </picture>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="load-more-sec">
                <div class="auto-load text-center" style="display: none;">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" height="60" viewBox="0 0 100 100"
                        enable-background="new 0 0 0 0" xml:space="preserve">
                        <path fill="#000"
                            d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                            <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                from="0 50 50" to="360 50 50" repeatCount="indefinite"></animateTransform>
                        </path>
                    </svg>
                </div>
                <div class="d-flex justify-content-center my-2 ">
                    {{-- <a type="button" class="load-more-data">আরও</a> --}}
                    {{$latestNews->links()}}
                </div>
            </div>
        </div>
    </div>
</main>

@endsection