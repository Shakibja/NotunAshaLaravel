    <!-- ########## START: LEFT PANEL ########## -->
    <div class="br-logo ml-2">
      <a href="{{ route('dashboard') }}">
        <img src="{{asset('frontend')}}/images/Notun_Asha_Logo.png" alt="Notun Asha Logo" class="w-50 img-fluid">
      </a>
    </div>
    {{-- <span></span>Notun<i> Asha</i><span></span> --}}
    <div class="br-sideleft sideleft-scrollbar">
      <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
      <ul class="br-sideleft-menu">
        <li class="br-menu-item">
          <a href="{{ route('dashboard') }}" class="br-menu-link active text-decoration-none">
            <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
            <span class="menu-item-label">Dashboard</span>
          </a><!-- br-menu-link -->
        </li><!-- br-menu-item -->

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub text-decoration-none">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">News</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('add_news_page')}}" class="sub-link text-decoration-none">Add News</a></li>
            <li class="sub-item"><a href="{{ route('banner_view')}}" class="sub-link text-decoration-none">View All Advertise</a></li>
            <li class="sub-item"><a href="{{ route('manage_news_page')}}" class="sub-link text-decoration-none">View All News</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub text-decoration-none">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Multimedia</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('add_multimedia_page')}}" class="sub-link text-decoration-none">Add Multimedia</a></li>
            <li class="sub-item"><a href="{{ route('manage_multimedia_page')}}" class="sub-link text-decoration-none">View & Edit</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub text-decoration-none">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">News Category</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('category_page')}}" class="sub-link text-decoration-none">Add &amp; Manage</a></li>
          </ul>
        </li>

        <li class="br-menu-item">
          <a href="#" class="br-menu-link with-sub text-decoration-none">
            <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
            <span class="menu-item-label">Author</span>
          </a><!-- br-menu-link -->
          <ul class="br-menu-sub">
            <li class="sub-item"><a href="{{ route('author_page')}}" class="sub-link text-decoration-none">Add &amp; Manage</a></li>
          </ul>
        </li>
          <li class="br-menu-item">
              <a href="#" class="br-menu-link with-sub text-decoration-none">
                  <i class="menu-item-icon icon ion-ios-photos-outline tx-20"></i>
                  <span class="menu-item-label">E-Paper</span>
              </a><!-- br-menu-link -->
              <ul class="br-menu-sub">
                  <li class="sub-item"><a href="{{ route('add_e_paper')}}" class="sub-link text-decoration-none">Add E Paper Page</a></li>
                  {{--   <li class="sub-item"><a href="{{ route('epaper_column')}}" class="sub-link text-decoration-none">Add E Paper Column</a></li> --}}
                  <li class="sub-item"><a href="{{ route('epaper_ads')}}" class="sub-link text-decoration-none">Add E Paper Ads</a></li>
{{--                  <li class="sub-item"><a href="{{ route('manage_multimedia_page')}}" class="sub-link text-decoration-none">View & Edit</a></li>--}}
              </ul>
          </li>
      <br>
    </div><!-- br-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->
