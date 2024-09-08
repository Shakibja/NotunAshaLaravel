<!DOCTYPE html>
<html lang="en">
  <head>
      @include('backend.includes.head')
      @include('backend.includes.css')
    
  </head>

  <body class="bg-white">

    @include('backend.includes.leftbar')

    @include('backend.includes.topbar')
    @include('backend.includes.rightbar')
    
    @yield('info')
    

                                                                    
    @include('backend.includes.scripts')
  </body>
</html>
