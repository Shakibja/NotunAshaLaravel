<?php

use Carbon\Carbon;
use App\Models\Backend\Category;
use App\Models\Backend\PostNews;

$date_from_db = $e_paper[0]['date'];
    
// Set the locale to Bangla
$now = Carbon::parse($date_from_db)->locale('bn');
// $now = Carbon::now()->locale('bn');
$dayInBangla = $now->isoFormat('dddd');
$date = $now->isoFormat('D MMMM YYYY');
$time = $now->isoFormat('A h:mm');
$page_number = 1;

$eng = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
$bng = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
// navbar news category
//   $categories = Category::where('category_status', 'true')->take(6)->get();
//   $more_categories = Category::where('category_status', 'true')->skip(6)->take(7)->get();

// navbar breaking news
// $breakingNews = PostNews::whereDate('created_at', '>', now()->subDay())->get();
//   $breakingNews = PostNews::orderBy('news_id', 'desc')->take(7)->get();

$categories_1 = Category::where('category_status', 1)->take(13)->get();
$categories_2 = Category::where('category_status', 1)->skip(13)->take(13)->get();

?>

@extends('frontend.mastering.master')
@section('page-content')

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/content/themes/AmaderShomoy-W3/assets/css/w3.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/content/themes/AmaderShomoy-W3/assets/css/amader-shomoy.css">
    <script type="text/javascript">
        _atrk_opts = {
            atrk_acct: "aTBDr1DlQy20Y8",
            domain: "dainikamadershomoy.com",
            dynamic: true
        };
        (function() {
            var as = document.createElement('script');
            as.type = 'text/javascript';
            as.async = true;
            as.src = "https://certify-js.alexametrics.com/atrk.js";
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(as, s);
        })();
    </script>
    <noscript><img src="https://certify.alexametrics.com/atrk.gif?account=aTBDr1DlQy20Y8" style="display:none" height="1" width="1" alt="" /></noscript>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37213489-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37213489-3');
    </script>
</head>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12 col-12">
            <style>
                .news-item:hover {
                    background-color: aquamarine;
                    cursor: pointer;
                    opacity: 0.5
                }
            </style>

            <h1 class="w3-xlarge mt-3"> পাতা {{str_ireplace($eng, $bng, $page_number)}} <small class="w3-text-gray">ই-পেপার [ {{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}} ]</small> </h1>
            <p class="w3-bar w3-center" style="background-color: #F1F1F1;height: 60px;display: flex;justify-content: center;align-items: center;">
                @foreach ($e_paper as $key=>$e_pap)
                <a href="{{route('page', ['date' => $e_pap->date, 'page_number' => $e_pap->page_number])}}" class="w3-button w3-border
                                            "> {{$key+1}} </a>
                @endforeach
            </p>

            <div class="w3-border w3-margin-bottom" id="e-paper" style="position: relative; overflow-y: scroll"> <span><a><img src="{{ asset('backend/images/e-paper-page/' . $e_paper1[0]['page_image']) }}" style="width: 850px"></a></span>
                @foreach($e_paper_column as $item)
                <div onclick="document.getElementById('{{ $item->page_number }}_{{ $item->column_number }}').style.display='block'" class="news-item" style="z-index: 0; top: {{ $item->top }}; left: {{ $item->bottom }};width: {{ $item->width }}; height: {{ $item->height }}; position: absolute;"></div>
                @endforeach
            </div>
            <div class="w3-bar w3-margin-bottom">
                <a href="#" class="w3-button w3-green w3-disabled">&#10094; আগের পাতা</a>
                @if($e_paper[0]['page_number']==2)
                <a href="{{route('page',2)}}" class="w3-button w3-right w3-green">পরের পাতা &#10095;</a>
                @else
                <a href="#" class="w3-button w3-right w3-green w3-disabled">পরের পাতা &#10095;</a>
                @endif
            </div>
            <style>
                .responsive-iframe {
                    position: relative;
                    padding-bottom: 56.25%;
                    /*16:9*/
                    height: 700px;
                    overflow: hidden;
                }

                .responsive-iframe iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
            </style>
            @foreach($e_paper_column as $item)
            <div id="{{ $item->page_number }}_{{ $item->column_number }}" class="w3-modal">
                <div class="w3-modal-content w3-animate-zoom" style="min-width: 90%">
                    <div class="w3-container w3-padding-24"> <span onclick="document.getElementById('{{ $item->page_number }}_{{ $item->column_number }}').style.display='none'" class="w3-button w3-display-topright w3-xxlarge">&times;</span> <br /><br />
                        <div class="responsive-iframe"> <iframe src="{{ route('column_view', ['date' => $item->date,'page_number' => $item->page_number, 'column_number' => $item->column_number]) }}" width="100%" frameborder="0" allowfullscreen>
                                <p>Your browser does not support iframes.</p>
                            </iframe> </div>
                    </div>
                </div>
            </div>

            <!-- <a class="dropdown-item" href="{{ route('column_view', ['date' => $item->date,'page_number' => $item->page_number, 'column_number' => $item->column_number]) }}">test</a> -->
            @endforeach
        </div>

        <div class="col-md-4 col-sm-12 col-12">
            <div class="w3-container w3-light-gray mt-3">
                <h2>পুরোনো পত্রিকা</h2>
                <form action="{{ route('epaper') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="w3-row">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Date : </label>
                            <input type="date" name="date" class="form-control"  value="">
                        </div>
                    </div>
                    <div class="w3-row mt-2">
                        <div class="w3-col m12">
                            <!-- <p><button class="w3-button w3-green" value="search" name="find" type="submit">দেখুন</button></p> -->
                            <button type="submit" class="btn btn-success add-news ">দেখুন</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="w3-container" style="margin-top: 20px; height: 1060px;overflow-y: scroll;">
                @foreach ($e_paper_ads as $key=>$e_ads)
                <div class="w3-container" style="margin-top: 20px;">
                    <h2> {{$e_ads->ads_name}} </h2>
                    <div>
                        <a target="_blank" href="{{$e_ads->ads_links}}">
                            <div class="w3-display-container "> <img class="" src="{{ asset('backend/images/e-paper-page/ads/' . $e_ads->ads_image) }}" alt="Amader Shomoy" style="object-fit: cover; width:100%">
                                <div class="w3-display-middle"> <button class="w3-button w3-white"> পড়তে ক্লিক করুন </button> </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{asset('frontend')}}/content/themes/AmaderShomoy-W3/assets/js/apps_config.js">
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-37213489-3', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5ea2d9f6a0bcd00012f086f0&product=sop' async='async'></script>

@endsection