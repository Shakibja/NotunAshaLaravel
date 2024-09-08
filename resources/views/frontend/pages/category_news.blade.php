@extends('frontend.mastering.master')
@section('page-content')
<?php
    $categories = DB::table('categories')->where('category_status', 1)->take(10)->get();
    $categories_1 = DB::table('post_news')->where('news_status', 1)->where('category_slug', $category_name->category_slug)->orderBy('news_id', 'desc')->first();
    $categories_2 = DB::table('post_news')->where('news_status', 1)->where('category_slug', $category_name->category_slug)->orderBy('news_id', 'desc')->skip(1)->take(4)->get();
    $categories_3 = DB::table('post_news')->where('news_status', 1)->where('category_slug', $category_name->category_slug)->orderBy('news_id', 'desc')->skip(5)->paginate(12);
?>
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
<main>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="d-flex justify-content-center ">
                    <!-- TODO adv content to remove -->
                    <div class=" container">
                        <div class="adv-row ">
                        <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->nc_banner_1) }}" style="width: 100%;height: 80px;" />  
                       </div>
                    </div>
                    <!-- TODO adv content to remove -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category-area mt-3">
            <div class="heading-title d-flex align-items-center fs-4">
                <a href="#">
                    <h1>{{$category_name->category_name}}</h1> 
                </a>
                {{-- <p ><i class="fa-solid fa-angles-right fs-4 px-2"></i></p>
                <p class="d-inline-block " >ফুটবল</p> --}}
            </div>
            <!-- <div class="sub-category-area">
                <ul class="sub-category d-md-flex d-block gap-4">
                    @foreach($categories as $category)
                        <li class="sub-list"><a href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a></li>
                    @endforeach
                </ul>
            </div> -->
            <div class="category-lead mt-2">
                <div class="row my-4">
                    <div class="col-md-9">
                        <div class="DCatLead">
                            <!-- TODO dynamic -->
                            <a href="{{ route('news_details', $categories_1->slug)}}">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="img-box overflow-hidden">
                                            <picture>
                                                <img data-src="{{ asset('backend/images/news-himages/'.$categories_1->news_title_image)}}"
                                                    src="{{ asset('backend/images/news-himages/'.$categories_1->news_title_image)}}"
                                                    alt="{{$categories_1->news_headline}}"
                                                    title="{{$categories_1->news_headline}}"
                                                    class="img-fluid img100 rounded">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="col-md-5 position-relative">
                                        <div class="DCatLeadTitle ">
                                            <h1 class="title fs-3">{{$categories_1->news_headline}} </h1>
                                            <p class="CatDesc fs-6">{{ limitText($categories_1->news_body, 700) }}...</p>
                                            <p class="text-danger">বিস্তারিত...</p>
                                        </div>
                                        {{-- <span class="publishTime fs-8 position-absolute bottom-0">আপডেটঃ ১১ জানুয়ারি ২০২৪ | ১১:৪৩</span> --}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="DRightSideAdd mt-3 mb-4 col-12">
                            <div class="adv-col flex-grow-1 "></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="category-card-area my-2">
                <div class="row">
                    @foreach($categories_2 as $news)
                    <div class="col-md-3 d-flex">
                        <div class="Catcards align-items-stretch px-2  pt-2 pb-3 position-relative">
                            <a href="{{ route('news_details', $news->slug)}}">
                                <div class="img-box overflow-hidden">
                                    <picture>
                                        <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                            src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                            alt="{{$news->news_headline}}"
                                            title="{{$news->news_headline}}"
                                            class="img-fluid img100">
                                    </picture>
                                </div>
                                <div class="CatCardTitle my-3">
                                    <h3 class="fs-5 title">{{ limitText($news->news_headline, 150) }}</h3>
                                    <p class="text-danger">বিস্তারিত...</p>
                                </div>
                                {{-- <span class="publishTime fs-8 position-absolute bottom-0">আপডেটঃ ১১ জানুয়ারি ২০২৪ | ১১:৪৩</span> --}}
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="ad-area d-flex justify-content-center">
                <div class="col-12">
                    <div class="d-flex justify-content-center mt-4">
                        <!-- TODO adv content to remove -->
                        <div class=" container">
                            <div class="adv-row ">
                            <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->nc_banner_2) }}" style="width: 100%;height: 80px;" />   
                            </div>
                        </div>
                        <!-- TODO adv content to remove -->
                    </div>
                </div>
            </div>

            <div class="category-card-area my-2 ">
                <div class="row">
                    @foreach($categories_3 as $news)
                    <div class="col-md-3 mt-3">
                        <div class="card shadow border-0 rounded-4">
                            <a href="{{ route('news_details', $news->slug)}}" class="text-decoration-none text-dark">
                                <div class="card-img-top">
                                    <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                        src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                        alt="{{$news->news_headline}}"
                                        title="{{$news->news_headline}}"
                                        class="img-fluid img100">
                                </div>
                                <div class="card-body">
                                    <h3 class="card-title fs-5 mb-3">{{ limitText($news->news_headline, 82) }}</h3>
                                    <!-- <p class="text-danger mb-0">বিস্তারিত...</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div  class="my-2 mt-2 d-flex justify-content-center ">
                <!-- for click loader -->
                <!-- <a id="read-more-btn" type="button" class="load-more-data">আরও</a> -->
                {{-- <a  type="button" class="load-more-data">আরও</a> --}}
                {{$categories_3->links()}}
            </div>
            
            <!-- <div class="CatSubList-area my-4">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="DRightSideAdd mt-3 mb-4">
                            <div class="adv-col flex-grow-1 "></div>
                        </div>
                        <div class="DRightSideAdd">
                        </div>
                    </div>
                    <div class="col-lg-6" id="categoryContentList">
                        <div id="data-wrapper">
                            @foreach($categories_3 as $news)
                            <div class="CatListNews py-2 border-bottom">
                                <a href="{{ route('news_details', $news->slug)}}">
                                    <div class="row d-flex justify-content-end">
                                        <div class="col-md-6 col-6 position-relative">
                                            <div class="CatListhead">
                                                <h3 class="fs-5 title my-1"> {{$news->news_headline}}</h3>
                                            </div>
                                            <div class="ListDesc fs-6 pb-2">
                                                <p >{!! $news->news_highlights !!}</p>
                                            </div>
                                            {{-- <span class="publishTime fs-8 mt-3 position-absolute bottom-0">আপডেটঃ ১১ জানুয়ারি ২০২৪ | ১১:৪৩</span> --}}
                                        </div>
                                        <div class="col-md-6 col-6">
                                            <div class="img-box overflow-hidden">
                                                <picture>
                                                    <img data-src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                                        src="{{ asset('backend/images/news-himages/'.$news->news_title_image)}}"
                                                        alt="{{$news->news_headline}}"
                                                        title="{{$news->news_headline}}"
                                                        class="img-fluid img100 rounded">
                                                </picture>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div  class="my-2 d-flex justify-content-center ">
                            {{$categories_3->links()}}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="DRightSideAdd mt-3 mb-4">
                            <div id="div-gpt-ad-1699097504853-0" style="min-width: 300px; min-height: 250px;"
                                data-google-query-id="CK-N2oXR1IMDFTqQZgIde34KJg">
                                <div id="google_ads_iframe_/21871422770/DC_Rright1_0__container__"
                                    style="border: 0pt none;"><iframe
                                        id="google_ads_iframe_/21871422770/DC_Rright1_0"
                                        name="google_ads_iframe_/21871422770/DC_Rright1_0"
                                        title="3rd party ad content" width="" height="" scrolling="yes"
                                        marginwidth="0" marginheight="0" frameborder="0" aria-label="Advertisement"
                                        tabindex="0" allow="attribution-reporting"
                                        style="border: 0px; vertical-align: bottom;" data-load-complete="true"
                                        data-google-container-id="4"></iframe></div>
                            </div>
                        </div>
                        <div class="DRightSideAdd">
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</main>
@endsection