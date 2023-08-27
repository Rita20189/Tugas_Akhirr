<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Alvanza Food Court</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Libraries Stylesheet -->
  <link href="{!! asset('lib/animate/animate.min.css')!!}" rel="stylesheet">
  <link href="{!! asset('lib/owlcarousel/assets/owl.carousel.min.css')!!}" rel="stylesheet">
  <link href="{!! asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')!!}" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="{!! asset('css/bootstrap.min.css')!!}" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="{!! asset('css/style.css')!!}" rel="stylesheet">
  <link href="{!! asset('css/owl.carousel.css')!!}" rel="stylesheet">
  <link href="{!! asset('css/owl.carousel.min.css')!!}" rel="stylesheet">
  <style>
    .owl-carousel .owl-item {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .owl-carousel .owl-nav {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      margin-top: 30px;
      color: white;
    }

    .owl-carousel .owl-nav .owl-next {
      margin-left: 30px;
    }

    .hero-nav {
      background: linear-gradient(rgba(255, 0, 0, 0.5), rgba(255, 0, 0, 0.5)), url(../img/bg-foto1.jpg);
      background-position: center center;
      background-repeat: no-repeat;
      background-size: cover;
    }

    /* BUTTON BIKIN SENDIRI */
    .btn-outlet {
      background-color: white;
      color: #ac1e0b;
      font-weight: bold;
    }

    .btn-outlet:hover {
      background-color: #ac1e0b;
      color: white;
    }
  </style>
</head>

<body>

  <!-- Navbar & Hero Start -->
  <div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
      <a href="" class="navbar-brand p-0">
        <div class="d-flex align-items-center">
          <img src="{!! asset('img/logo.png') !!}" alt="" class="me-3" width="50vh">
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
            <h1 class="text-primary m-0" style="font-size: 5vh;">Alvanza</h1>
          </div>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
          <a href="{{url('get-cart')}}/{{$id_pesanan}}" class="nav-item nav-link custom-link">
            <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 576 512">
              <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
            </svg>
            <sup class="badge bg-danger rounded-3">{{count($itemPesanan)}}</sup>
          </a>
          <a href="{{ url('/') }}" class="nav-item nav-link custom-link">Home</a>
        </div>
      </div>
    </nav>
    <div class="container-xxl py-5 hero-nav">
      <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 mb-5 animated slideInDown text-white">- Pilih Outlet -</h1>
        <div class="owl-carousel text-center">
          @foreach($outlet as $outlet)
          <div class="border rounded-2 p-4 bg-warning ">
            <div class="align-items-center mx-auto text-center">
              <img class="text-center" src="{{ asset('images/'.$outlet->logo) }}">
              <div class="ps-3 text-center">
                <a href="/pilih_menu/{{$outlet->id}}" class="btn btn-outlet fw-bold rounded-3 px-4 mt-4">Pesan</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <script src="{{asset('https://code.jquery.com/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    <script>
      $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: [
          '<i class="fas fa-chevron-left"></i>', // Ikon "Previous"
          '<i class="fas fa-chevron-right"></i>' // Ikon "Next"
        ],
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 3
          },
          1000: {
            items: 5
          }
        }
      });
    </script>
</body>

</html>