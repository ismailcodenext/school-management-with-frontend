<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pabna International School | Home</title>

    <!-- Link Swiper's CSS Start -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />
    <!-- Link Swiper's CSS End -->

    <!-- Font Awesome Icon CDN CSS Start -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />
    <!-- Font Awesome Icon CDN CSS End -->

    <!-- Main CSS Start -->
    <link rel="stylesheet" href="{{asset('front-end/assets/css/style.css')}}" />
    <!-- Main CSS End -->

    <!-- Bootstrap CSS Link Start -->
    <link rel="stylesheet" href="{{asset('front-end/assets/css/bootstrap/bootstrap.min.css')}}" />
    <!-- Bootstrap CSS Link End -->
  </head>

  <body>

    <div id="loader" class="LoadingOverlay d-none">
      <div class="Line-Progress">
          <div class="indeterminate"></div>
      </div>
      </div>
      
      <div>
          @yield('content')
      </div>
      <script>
      
      </script>
      
      <script src="{{asset('js/bootstrap.bundle.js')}}"></script>
      
    <!-- Scripts -->
    <script src="{{asset('front-end/js/navbar.js')}}"></script>

    <!-- Swiper JS Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('front-end/js/app.js')}}"></script>
    <!-- Swiper JS Link -->

    <!-- JS File link -->
    <script src="{{asset('front-end/assets/css/bootstrap/bootstrap.min.js')}}"></script>
    <!-- js link -->
  </body>
</html>