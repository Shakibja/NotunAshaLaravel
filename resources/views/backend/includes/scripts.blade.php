    <script src="{{asset('backend')}}/lib/jquery/jquery.min.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-ui/ui/widgets/datepicker.js"></script>
    <script src="{{asset('backend')}}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/lib/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="{{asset('backend')}}/lib/moment/min/moment.min.js"></script>
    <script src="{{asset('backend')}}/lib/peity/jquery.peity.min.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/vendor/d3.min.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/vendor/d3.layout.min.js"></script>
    <script src="{{asset('backend')}}/lib/rickshaw/rickshaw.min.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.flot/jquery.flot.js"></script>
    <script src="{{asset('backend')}}/lib/jquery.flot/jquery.flot.resize.js"></script>
    <script src="{{asset('backend')}}/lib/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="{{asset('backend')}}/lib/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="{{asset('backend')}}/lib/echarts/echarts.min.js"></script>
    <script src="{{asset('backend')}}/lib/select2/js/select2.full.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
    <script src="{{asset('backend')}}/lib/gmaps/gmaps.min.js"></script>

    <script src="{{asset('backend')}}/js/bracket.js"></script>
    <script src="{{asset('backend')}}/js/map.shiftworker.js"></script>
    <script src="{{asset('backend')}}/js/ResizeSensor.js"></script>
    <script src="{{asset('backend')}}/js/dashboard.js"></script>





    {{-- Data Table --}}
    <script src="{{asset('backend')}}/datatable/js/custom-data-table.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>

    <!-- Check Editor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <script>
      ClassicEditor
              .create( document.querySelector( '#newsHighlightEditor' ) )
              .then( editor => {
                      console.log( editor );
              } )
              .catch( error => {
                      console.error( error );
              } );
    </script>
    <script>
      ClassicEditor
              .create( document.querySelector( '#newsBodyEditor' ),
               {
                ckfinder:{
                  uploadUrl: "{{ route('inner_image_upload', ['_token'=>csrf_token()])}}",
                }
               })
              .then( editor => {
                      console.log( editor );
              } )
              .catch( error => {
                      console.error( error );
              } );
    </script>






    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script> --}}
    {{-- <script>
      ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
          console.log(editor);
        })
        .catch(error => {
          console.error(error);
        });
      // CKEDITOR.replace( 'editor1' );
    </script>
        <script>
          ClassicEditor
            .create(document.querySelector('#editor2'))
            .then(editor => {
              console.log(editor);
            })
            .catch(error => {
              console.error(error);
            });
          // CKEDITOR.replace( 'editor1' );
        </script> --}}

    <!-- Custom JS file -->
    <script src="{{asset('backend')}}/js/custom/custom.js"></script>

    <!-- Toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>

      // ###############################
      //Author
      // ###############################
      // ADD Author
       @if(Session::has('author_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('author_success') }}")
        @endif
        @if(Session::has('author_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('author_faield') }}")
        @endif

        // Delete Author
        @if(Session::has('del_author_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('del_author_success') }}")
        @endif
        @if(Session::has('del_author_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('del_author_faield') }}")
        @endif


        // Update Author
        @if(Session::has('up_author_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('up_author_success') }}")
        @endif
        @if(Session::has('up_author_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('up_author_faield') }}")
        @endif


        // ###############################
      //category
      // ###############################
      // ADD category
       @if(Session::has('category_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('category_success') }}")
        @endif
        @if(Session::has('category_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('category_faield') }}")
        @endif

        // Delete category
        @if(Session::has('del_category_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('del_category_success') }}")
        @endif
        @if(Session::has('del_category_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('del_category_faield') }}")
        @endif


        // Update category
        @if(Session::has('up_category_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('up_category_success') }}")
        @endif
        @if(Session::has('up_category_faield'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('up_category_faield') }}")
        @endif



      // ###############################
      //NewsPost
      // ###############################
      // ADD NewsPost
       @if(Session::has('add_news_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('add_news_success') }}")
        @endif
        @if(Session::has('add_news_failed'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('add_news_failed') }}")
        @endif

      // Data not found
      @if(Session::has('delete_news_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('delete_news_success') }}")
        @endif


        // Delete NewsPost
       @if(Session::has('delete_news_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('delete_news_success') }}")
        @endif


        // Update News
        @if(Session::has('update_news_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('update_news_success') }}")
        // alert('Updated Done');
        @endif

        @if(Session::has('update_news_failed'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.error("{{ session('update_news_failed') }}")
        @endif


        // Upload Video
        @if(Session::has('add_video_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('add_video_success') }}")
        @endif

        @if(Session::has('update_milti_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('update_milti_success') }}")
        @endif

        @if(Session::has('delete_milti_success'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('delete_milti_success') }}")
        @endif

        @if(Session::has('delete_milti_faild'))
        toastr.options = {
            "closeButton" : true,
        }
        toastr.success("{{ session('delete_milti_faild') }}")
        @endif


    </script>


    <script>
      $(function(){
        'use strict'

        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
          minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
          if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
          } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
            $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
            $('body').removeClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideDown();
          }
        }
      });
    </script>

    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#addFeaturesRow").on("click",function(){
                    var new_row=$("#hidden-location-box").html();
                    $("#nearest-place-box").append(new_row)

                })
                $(document).on('click', '.removeNearestPlaceRow', function() {
                    $(this).closest('.delete-dynamic-location').remove();
                });
                //end dynamic nearest place add and remove



            });

        })(jQuery);

    </script>

  {{-- Custom JS File --}}
  <script src="{{asset('backend')}}/js/custom/custom.js"></script>
