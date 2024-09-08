@extends('frontend.mastering.front-master')
@section('info')

    @if(count($searches)==0)
        <div class="container container-fluid">
            <div class="row" style="height: auto;">
                <div class="col-md-12 text-center my-5 pt-5">
                    <h2 class="font-shiliguri fw-bold">দুঃখিত ! আপনার দেয়া শব্দটির সাথে এখানে কোনো খবরের মিল পাওয়া যায়নি।</h2>
                </div>
            </div>
        </div>
    @endif
    
    <div class="container container-fluid">
        <div class="row">
            @foreach ($searches as $result)
                <div class="col-md-3">
                    <img class="img-fluid" src="{{asset('public/techworldbd_news_images/title_images/'.$result->news_title_image)}}" alt="Card image">
                    <div class="uddog-info mt-2 ">
                        <h3 class="p-2 font-kalpurush font-16">
                            <a href="{{ route('news_details',$result->slug) }}" class="text-dark text-decoration-none fw-bold">{{$result->news_headline}}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection