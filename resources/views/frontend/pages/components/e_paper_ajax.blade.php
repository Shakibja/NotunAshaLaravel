<link rel="stylesheet" href="{{asset('frontend')}}/glightbox/css/glightbox.min.css">

@foreach($pages as $page)
    <a href="{{ asset('backend/images/e-paper-page/'.$page->page_image) }}" title="" data-effect="fade"  data-zoomable="true" data-draggable="true"
       class="glightbox preview-link">
        <img src="{{ asset('backend/images/e-paper-page/'.$page->page_image) }}" class="img-fluid gallery-photo" alt="">
    </a>
@endforeach
<script src="{{asset('frontend')}}/glightbox/js/glightbox.min.js"></script>

<script>
    const glightbox = GLightbox({
        selector: '.glightbox'
    });
</script>
