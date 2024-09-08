
<div class="col-md-3">
    <!-- section header -->
    <div class="col-md-12 ">
        <div class="quickPostSection my-3 my-md-0  d-flex align-items-center justify-content-center  ">
            <div class="d-flex align-items-center justify-content-between col-12 py-2">
                <p class="px-3 my-auto"><i class=" fa-solid fa-circle-half-stroke "></i></p>
                <p class="flex-grow-1 my-auto">বাংলা-প্রবাস</p>
            </div>
        </div>
        <div class="quickPostSectionItem ">
            <ul class="list-group">
                <ul class="list-group bg-transparent">
                    @foreach($ban_abroad as $news)
                    <li class="list-group-item">
                        <a class="title h7" href="{{ route('news_details', $news->slug)}}">{{ $news->news_headline }}</a>
                    </li>
                    @endforeach
                </ul>
            </ul>
        </div>
    </div>
</div>