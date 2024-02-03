<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pabna International School |  @yield('title')</title>

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

    <!-- Style CSS Start -->
    <link rel="stylesheet" href="{{asset('front-end/assets/css/style.css')}}" />
    <!-- Style CSS End -->

        <!-- Principals CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/principals-message.css')}}" />
        <!-- Principals CSS End -->

        <!--Vice Principals CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/vice-Principals message.css')}}" />
        <!--Vice Principals CSS End -->

        <!-- Teachers CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/teachers-information.css')}}" />
        <!-- Teachers CSS End -->

        <!-- Admission CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/admission-form.css')}}" />
        <!-- Admission CSS End -->

        <!-- Institute CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/institute-gallery.css')}}" />
        <!-- Institute CSS End -->

        <!-- Routing CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/class-routine.css')}}" />
        <!-- Routing CSS End -->

        <!-- Contact CSS Start -->
        <link rel="stylesheet" href="{{asset('front-end/assets/css/contact.css')}}" />
        <!-- Contact CSS End -->

    <!-- Bootstrap CSS Link Start -->
    <link rel="stylesheet" href="{{asset('front-end/assets/css/bootstrap/bootstrap.min.css')}}" />
    <!-- Bootstrap CSS Link End -->
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
  </head>

  <body>

      <div>
          @yield('content')
      </div>
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