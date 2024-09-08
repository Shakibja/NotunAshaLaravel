<footer>
    
    <div class="container">
        <div class="row">
            <div class="footerTopSection">
                <ul>
                    @foreach($categories as $category)
                    <li class="px-2"><a href="{{ route('news_by_category', $category->category_slug)}}">{{$category->category_name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="footerMiddleSection">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <p class="my-1"><a href="">PRIVACY POLICY</a></p>
                        <p class="my-1"><a href="">TERMS OF USE</a></p>
                        <p class="my-1"><a href="#">ALL RIGHTS RESERVED</a></p>
                        <p class="my-1">Design & Developed By <a href="https://techsolutionsbd.com/">Techsolutions Plex Ltd.</a></p>
                        
                    </div>
                    <div class="col-lg-4 col-12">
                        
                        <h5 class="h9">সম্পাদক ও প্রকাশক :</h5>
                        <h5 class="fw-bold">অধ্যক্ষ রওশন আরা মান্নান এমপি</h5>
                        <p>ফোন : <a href="tel:+8801712005571">+8801 712 005 571</a> <br> 
                                {{-- href="tel:+8801710224722">+8801 710 224 722</a></p> --}}
                        
                        <p>ই-মেইল: <a href="mailto:dailynotunasha@gmail.com">dailynotunasha@gmail.com</a>,
                            <a href="mailto:info@dailynotunasha.com">info@dailynotunasha.com</a>
                        </p>
                        <address class="mt-2">রয়াল একাডেমি বিল্ডিং ১৫৮/২, ইনার সার্কুলার রোড়,</address>
                        <address>আরামবাগ, মতিঝিল, ঢাকা।</address>
                    </div>
                    <div class="col-lg-4 col-12">
                        <h5 class="FSocialHeadLine ">ফলো করুন </h5>
                        <div class="FSocialShare">
                            <ul>
                                <li><a href="https://www.facebook.com/notunashabd" target="_blank"><i
                                            class="fa-brands fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/" target="_blank"><i
                                            class="fa-brands fa-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/" target="_blank"><i
                                            class="fa-brands fa-linkedin-in"></i></a>
                                </li>
                                <li><a href="https://www.youtube.com/" target="_blank"><i
                                            class="fa-brands fa-youtube"></i></a></li>
                                <li><a href="https://www.instagram.com/" target="_blank"><i
                                            class="fa-brands fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <a href="" class="Flogo" rel="home">
                            <img src="{{asset('frontend')}}/images/logo.svg" title=" GET THE LATEST ONLINE BANGLA NEWS"
                                alt="GET THE LATEST ONLINE BANGLA NEWS" class="img-fluid img100">
                        </a>

                        <h5 class="FCopyRight ">© <a href="#">নতুন আশা</a>. সমস্ত
                            অধিকার সংরক্ষিত.® </h5>
                        <script>
                            let banglaNumber = {
                                0: "০",
                                1: "১",
                                2: "২",
                                3: "৩",
                                4: "৪",
                                5: "৫",
                                6: "৬",
                                7: "৭",
                                8: "৮",
                                9: "৯",
                            };
                            const engToBdNum = (str) => {
                                for (var x in banglaNumber) {
                                    str = str.replace(new RegExp(x, "g"), banglaNumber[x]);
                                }
                                return str;
                            };
                            const year = new Date().getFullYear().toString()
                            const bnYear = engToBdNum(year)
                           
                            document.getElementById('copywrightTear').innerText = bnYear

                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>