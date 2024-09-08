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

  // navbar news category
    //   $categories = Category::where('category_status', 'true')->take(6)->get();
    //   $more_categories = Category::where('category_status', 'true')->skip(6)->take(7)->get();
    
    // navbar breaking news
    // $breakingNews = PostNews::whereDate('created_at', '>', now()->subDay())->get();
    //   $breakingNews = PostNews::orderBy('news_id', 'desc')->take(7)->get();

    $categories_1 = Category::where('category_status', 1)->orderBy('priority','asc')->take(10)->get();
	$categories_2 = Category::where('category_status', 1)->orderBy('priority','asc')->skip(13)->take(13)->get();

?>
<div class="d-md-flex d-none my-3 col-12 justify-content-between align-items-end container">
    <div class="d-flex gap-2 date-container">
        <span><i class="fa-regular fa-calendar-days"></i></span>
        {{-- <span class="">বুধবার, ০৩ জানুয়ারি ২০২৪</span>$dayInBangla --}}
        <span class="">{{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}}</span>
    </div>
    <div class="flex-grow-1 d-flex justify-content-center">
        <a href="{{ route('home') }}">
            <img height="130" src="{{asset('frontend/images/Notun_Asha_logo.png')}}" alt="Daily Notun Asha">
        </a>
    </div>
    <div class="d-flex align-items-baseline justify-content-end gap-2 social-container ">
        <!-- <span class="p-2 rounded-circle border-1 border-success"><i class="fa-brands fa-facebook-f"></i></span>
                    <span class="p-2 rounded-circle border-1 border-success"><i class="fa-brands fa-twitter"></i></span>
                    <span class="p-2 rounded-circle border-1 border-success"><i class="fa-brands fa-linkedin"></i></span>
                    <span class="p-2 rounded-circle border-1 border-success"><i class="fa-brands fa-youtube"></i></span>
                    <span class="p-2 rounded-circle border-1 border-success"><i class="fa-brands fa-instagram"></i></span> -->
        <div class="FSocialShare">
            <ul>
                <li><a href="https://www.facebook.com/notunashabd" target="_blank"><i
                            class="fa-brands fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                </li>
                <li><a href="https://www.linkedin.com/" target="_blank"><i
                            class="fa-brands fa-linkedin-in"></i></a>
                </li>
                <li><a href="https://www.youtube.com/" target="_blank"><i
                            class="fa-brands fa-youtube"></i></a>
                </li>
                <li><a href="https://www.instagram.com/" target="_blank"><i
                            class="fa-brands fa-instagram"></i></a></li>
            </ul>
        </div>
        <!-- <a href="#" class="btn py-2 px-3 border-2 border-success">ই-পেপার</a>
                    <a href="#" class="btn py-2 px-3 border-2 border-success">English</a> -->
    </div>
</div>

<div class="d-md-none my-3 col-12 justify-content-between align-items-end container">

    <div class="d-flex justify-content-center">
        <img src="{{asset('frontend/images/Notun_Asha_logo.png')}}" class=" w-50 img-fluid" alt="logo" style="height: 100px;">
    </div>
    <div class="d-flex gap-2 date-container">
        <span><i class="fa-regular fa-calendar-days"></i></span>
        <span class="">{{$dayInBangla}}, {{str_ireplace($eng, $bng, $date)}}</span>
    </div>
    <div class="d-flex align-items-baseline  gap-2 social-container FSocialShare ">

        <ul>
            <li><a href="https://www.facebook.com/notunashabd" target="_blank"><i
                        class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
            <li><a href="https://www.linkedin.com/" target="_blank"><i
                        class="fa-brands fa-linkedin-in"></i></a>
            </li>
            <li><a href="https://www.youtube.com/" target="_blank"><i class="fa-brands fa-youtube"></i></a>
            </li>
            <li><a href="https://www.instagram.com/" target="_blank"><i
                        class="fa-brands fa-instagram"></i></a>
            </li>
        </ul>

        {{-- <a href="#" class="btn py-2 px-3 border-2 d-none d-sm-flex border-success">ই-পেপার</a>
        <a href="#" class="btn py-2 px-3 border-2 border-success">English</a> --}}
    </div>
</div>
<nav class="navbar navbar-expand-md notun-asha-nav" aria-label="Second navbar example">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><i class="fa-solid fa-house-chimney"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto ">
                <li class="nav-item HomeBtn" style="padding: 6px;">
                    <a class="nav-link" style="font-weight: bold;font-size: 18px;" href="{{route('latestNews')}}">সর্বশেষ</a>
                </li>
                @foreach($categories_1 as $category)
                <li class="nav-item HomeBtn" style="padding: 6px;">
                    <a class="nav-link" style="font-weight: bold;font-size: 18px;" href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a>
                </li>
                @endforeach

                <li class="nav-item HomeBtn" style="padding: 6px;">
                    <a class="nav-link" style="font-weight: bold;font-size: 18px;" href="{{route('epaper')}}">ই-পেপার</a>
                </li>
             

                <!-- <li class="nav-item"><a class="nav-link text-nowrap" href="/laws-regulassion">আইন-আদালত</a></li>
                <li class="nav-item"><a class="nav-link" href="/sarasesh">সারাদেশ</a></li>
                <li class="nav-item"><a class="nav-link text-nowrap" href="/probas-bangla">বাংলা প্রবাস</a></li>
                <li class="nav-item"><a class="nav-link" href="/videos">ভিডিও</a></li> -->
                <!-- <li class="nav-item"><a class="nav-link" href="/other">অন্যান্য</a></li> -->
                <li class="nav-item dropdown" style="padding: 6px;">
                    <a class="nav-link dropdown-toggle" style="font-weight: bold;font-size: 18px;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        অন্যান্য
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{-- <a class="dropdown-item" href="/lifestyle"></a>
                        <a class="dropdown-item" href="/welth"></a>
                        <a class="dropdown-item" href="/laws-regulassion"></a> --}}
                        {{-- <a class="dropdown-item" href="/sarasesh">সারাদেশ</a> --}}
                        {{-- <a class="dropdown-item" href="/probas-bangla">বাংলা প্রবাস</a> --}}
                        {{-- <a class="dropdown-item" href="/videos"></a> --}}
                        @foreach($categories_2 as $category)
                            <a class="dropdown-item" href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a>
                        @endforeach
                    </div>
                </li>
                {{-- <li class="nav-item"><a class="nav-link" href="/binodon"></a></li> --}}
            </ul>
        </div>
    </div>
</nav>