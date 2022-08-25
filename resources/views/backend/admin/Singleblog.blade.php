<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
  ================================================== -->
    <meta charset="utf-8">
    <title>ADotCurve</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Construction Html5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">

    <!-- Favicon
  ================================================== -->
    <link rel="icon" type="image/png" href="">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap/bootstrap.min.css')}}">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/fontawesome/css/blog.css')}}">
    <!-- Animation -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/animate-css/animate.css')}}">
    <!-- slick Carousel -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick-theme.css')}}">

    <!-- Colorbox -->
    <link rel="stylesheet" href="{{asset('frontend/plugins/colorbox/colorbox.css')}}">

    <!-- Template styles-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">


</head>
<body>
<header>
    <!-- Intro settings -->
    <style>
      #intro {
        /* Margin to fix overlapping fixed navbar */
        margin-top: 58px;
      }

      @media (max-width: 991px) {
        #intro {
          /* Margin to fix overlapping fixed navbar */
          margin-top: 45px;
        }
      }
    </style>
    <!-- Navbar -->
    <div class="container">
        @foreach($posts as $post)
    <div id="intro" class="p-5 text-center bg-light">
      <h1 class="mb-0 h4">Welcome,{{$post->title}}</h1>
    </div>
@endforeach
    </div>
  </header>
  <!--Main Navigation-->

  <!--Main layout-->
  <main class="mt-4 mb-5">
    <div class="container">
    @foreach($posts as $post)
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-md-8 mb-4">
          <!--Section: Post data-mdb-->
          <section class="border-bottom mb-4">
            <img src="{{ asset('assets/blog/'.$post->image) }}"
              class="img-fluid shadow-2-strong rounded-5 mb-4" alt="" />
          </section>
          <!--Section: Post data-mdb-->

          <!--Section: Text-->
          <section>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Optio sapiente molestias
              consectetur. Fuga nulla officia error placeat veniam, officiis rerum laboriosam
              ullam molestiae magni velit laborum itaque minima doloribus eligendi! Lorem ipsum,
              dolor sit amet consectetur adipisicing elit. Optio sapiente molestias consectetur.
              Fuga nulla officia error placeat veniam, officiis rerum laboriosam ullam molestiae
              magni velit laborum itaque minima doloribus eligendi!
            </p>

            <p><strong>Optio sapiente molestias consectetur?</strong></p>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum architecto ex ab aut
              tempora officia libero praesentium, sint id magnam eius natus unde blanditiis. Autem
              adipisci totam sit consequuntur eligendi.
            </p>

            <p class="note note-light">
              <strong>Note:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              Optio odit consequatur porro sequi ab distinctio modi. Rerum cum dolores sint,
              adipisci ad veritatis laborum eaque illum saepe mollitia ut voluptatum.
            </p>

            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, libero repellat
              molestiae aperiam laborum aliquid atque magni nostrum, inventore perspiciatis
              possimus quia incidunt maiores molestias eaque nam commodi! Magnam, labore.
            </p>

          </section>
          <!--Section: Text-->
          <!--Section: Share buttons-->
        </div>
      </div>
      @endforeach
    </div>
   
    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2020 Copyright:
      <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>


    <!-- Javascript Files
    ================================================== -->

    <!-- initialize jQuery Library -->
    <script src="{{asset('frontend/plugins/jQuery/jquery.min.js')}}"></script>
    <!-- Bootstrap jQuery -->
    <script src="{{asset('frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
    <!-- Slick Carousel -->
    <script src="{{asset('frontend/plugins/slick/slick.min.js')}}"></script>
    <script src="{{asset('frontend/plugins/slick/slick-animation.min.js')}}"></script>
    <!-- Color box -->
    <script src="{{asset('frontend/plugins/colorbox/jquery.colorbox.js')}}"></script>

    <!-- shuffle -->
    <script src="{{asset('frontend/plugins/shuffle/shuffle.min.js')}}" defer></script>

    <!-- Google Map API Key-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
    <!-- Google Map Plugin-->
    <script src="{{asset('frontend/plugins/google-map/map.js')}}" defer></script>

    <!-- Template custom -->
    <script src="{{asset('frontend/js/script.js')}}"></script>

</div><!-- Body inner end -->
</body>
</html>
