<script src="{{asset('backend')}}/lib/jquery/jquery.min.js"></script>
<script src="{{asset('frontend')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('frontend')}}/js/slide-carousel.js"></script>
<script src="{{asset('frontend')}}/js/fontSize.js"></script>
<script src="{{asset('frontend')}}/glightbox/js/glightbox.min.js"></script>

<script>
    {{--$(document).on('click', '#e_paper_search_btn', function () {--}}

    {{--    var date = $('#e_paper_date').val();--}}


    {{--    $.ajax({--}}
    {{--        type: "GET",--}}
    {{--        --}}{{--url: "{{url('/product/get-subcategory-by-category')}}",--}}
    {{--        // or--}}
    {{--        url: "{{route('get_e_paper_page')}}",--}}
    {{--        data: {date: date},--}}
    {{--        dateType: "JSON",--}}
    {{--        success: function (response) {--}}
    {{--            // console.log(response)--}}
    {{--            $("#e_paper_field").html(response);--}}
    {{--        }--}}
    {{--    });--}}
    {{--})--}}
    const glightbox = GLightbox({
        selector: '#glightbox'
    });
</script>

<script src="{{asset('frontend')}}/js/fontSize.js"></script>