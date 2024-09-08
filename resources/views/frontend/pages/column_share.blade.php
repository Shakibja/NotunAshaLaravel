<?php

use Carbon\Carbon;
use App\Models\Backend\Category;
use App\Models\Backend\PostNews;

$now = Carbon::now()->locale('bn');

$dayInBangla = $now->isoFormat('dddd');
$date = $now->isoFormat('D MMMM YYYY');

$time = $now->isoFormat('A h:mm');


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
        <div class="col-md-6 col-6">
            <div class="w3-col m6" style="margin-top:40px">
                <h6 class=""><b> E-paper <span class="w3-text-gray"> <a href="">{{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}}</a> </span> </b></h6>
            </div>
        </div>

        <div class="col-md-6 col-6">
            <div class="w3-col w3-right-align" style="margin-top:40px">
                <div class="sharethis-inline-share-buttons"></div>
            </div>
        </div>

        <div class="col-md-12 col-12">
        <div class="w3-row">
                    <div class="w3-col m12 w3-center">
                        <img class="w3-image" src="{{ asset('backend/images/e-paper-page/' . $column_news->column_image) }}">

                        <img class="w3-image mt-5" src="{{ asset('backend/images/e-paper-page/' . $column_news->map_image) }}">
                    </div>
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
