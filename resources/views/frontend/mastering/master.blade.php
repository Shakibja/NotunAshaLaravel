<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
    <title>দৈনিক নতুন আশা</title>
</head>

<body>
    <header>
        <div>
            @include('frontend.includes.nevigation')
        </div>
    </header>



    @yield('page-content')


    <!-- Footer -->
    @include('frontend.includes.footer')

    <!-- Script -->
    @include('frontend.includes.script')

</body>

</html>