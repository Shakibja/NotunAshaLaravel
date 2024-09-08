@extends('frontend.mastering.master')
@section('page-content')


<section class=" container mt-3">
    <div class="adv-row ">
        <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->m_banner_1) }}" style="width: 100%;height: 80px; " />
        <!--<h2 class="text-center">Advertisement</h2>-->
    </div>
</section>

{{-- লিড এবং সেকেন্ড লিড --}}
<section class="top-news container mt-4">
    <div class="row">

        {{-- লিড --}}
        @include('frontend.pages.components.lead')

        {{-- সম্পাদকীয় --}}
        @include('frontend.pages.components.editorial')
    </div>
</section>



<section class=" container mt-3">
    <div class="adv-row ">
        <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->m_banner_2) }}" style="width: 100%;height: 80px; " />
        <!--<h2 class="text-center">Advertisement</h2>-->
    </div>
</section>


<section class="top-of-the-talk py-1 my-2 container border-1 border-top">
    <div class="d-md-flex">
        {{-- আলোচনার শীর্ষে --}}
        @include('frontend.pages.components.talk_of_the_town')

        {{-- সর্বশেষ --}}
        @include('frontend.pages.components.latest')
    </div>
</section>

<section class="politics-n-cities py-1 my-1 container border-1 border-top">
    <div class="d-md-flex">
        <!-- রাজনীতি -->
        @include('frontend.pages.components.politics')

        <!-- আইন-আদালত -->
        @include('frontend.pages.components.court-and-law')
    </div>
</section>

<section class="Bangladesh py-1 my-1 container border-1 border-top">
    <div class="d-md-flex">
        <!-- সারাদেশ -->
        @include('frontend.pages.components.total-country')

        <!-- বাংলা-প্রবাস -->
        @include('frontend.pages.components.bangla-abroad')
    </div>
</section>

<!--  -->

<section class=" container mt-3">
    <div class="adv-row ">
        <img src="{{ asset('backend/images/e-paper-page/banner/' . $banner_show->m_banner_3) }}" style="width: 100%;height: 80px; " />
        <!--<h2 class="text-center">Advertisement</h2>-->
    </div>
</section>
<!-- খেলাধুলা -->
@include('frontend.pages.components.sports')


<!--  -->
<!-- <section class="quick-link py-2 my-2 container border-1 border-top">
    <div class="container text-center my-3">
       
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="//via.placeholder.com/500x400/31f?text=1" class="img-fluid"> 
                                    
                                </div>
                                <div class="card-img-overlay">Slide 1</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                   <img src="//via.placeholder.com/500x400/e66?text=2" class="img-fluid"> 
                                </div>
                                <div class="card-img-overlay">Slide 2</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                     <img src="//via.placeholder.com/500x400/7d2?text=3" class="img-fluid">
                                </div>
                                <div class="card-img-overlay">Slide 3</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                   <img src="//via.placeholder.com/500x400?text=4" class="img-fluid"> 
                                </div>
                                <div class="card-img-overlay">Slide 4</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                   <img src="//via.placeholder.com/500x400/aba?text=5" class="img-fluid"> 
                                </div>
                                <div class="card-img-overlay">Slide 5</div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img">
                                    <img src="//via.placeholder.com/500x400/fc0?text=6" class="img-fluid">
                                </div>
                                <div class="card-img-overlay">Slide 6</div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>
                <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </a>
            </div>
        </div>
       
    </div>
</section> -->

<section class="international py-1 my-2 container border-1 border-top">
    <div class="d-md-flex">
        <!-- আন্তর্জাতিক -->
        @include('frontend.pages.components.international')

        <!-- সর্বাধিক পঠিত -->
        @include('frontend.pages.components.most-readed')
    </div>
</section>


<!-- অর্থ ও বাণিজ্য-->
@include('frontend.pages.components.economy-trade')


<section class="tech-n-education py-2 my-1 container border-1 border-top">
    <div class="d-md-flex">

        <!-- প্রযুক্তি -->
        @include('frontend.pages.components.technology')

        <!-- শিক্ষাঙ্গন -->
        @include('frontend.pages.components.education')
    </div>
</section>

@endsection