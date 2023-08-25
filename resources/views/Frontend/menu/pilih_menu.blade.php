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
          <a href="{{ url('/pesan') }}" class="nav-item nav-link custom-link">Kembali</a>
        </div>
      </div>
    </nav>
    <div class="container-xxl py-5 hero-nav">
      <div class="container">
        <div class="container text-center">
          <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-4">
            <div class="card rounded-3 mb-3 w-50">
              <div class="card-body bg-warning rounded-3">
                <div class="align-items-center text-center">
                  <img class="text-center" src="{{ asset('images/'. $outlet->logo) }}" style="width: 20%;">
                  <h4 class="fw-bold text-dark">{{$outlet->nama_outlet}}</h4>
                  <div class="d-block justify-content-between mb-2 text-start">
                    <div>
                      <div class="d-flex justify-content-between mb-2">
                        <i class="fa fa-map-marker-alt me-3"></i>
                        Jl. Dr. Moh. Hatta No.15, Kapala Koto, Kec. Pauh,
                        Kota Padang, Sumatera Barat 25176
                      </div>
                      <div>
                        <div class="dropdown mb-3">
                          <p class="mb-2 dropdown-toggle" id="jamBukaDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-regular fa-clock me-3"></i>Jam Buka
                          </p>
                          <div class="dropdown-menu bg-warning" aria-labelledby="jam BukaDropdown">
                            <p class="dropdown-item">Senin 11:00 - 23:00</p>
                            <p class="dropdown-item">Selasa 11:00 - 23:00</p>
                            <p class="dropdown-item">Rabu 11:00 - 23:00</p>
                            <p class="dropdown-item">Kamis 11:00 - 23:00</p>
                            <p class="dropdown-item">Jumat 13:30 - 23:59</p>
                            <p class="dropdown-item">Sabtu 11:00 - 23:00</p>
                            <p class="dropdown-item">Minggu 11:00 - 23:00</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-2">
            <div class="border bg-warning">
              <div class="align-items-center text-center">
                <button class="btn btn-warning btn-kategori" data-kategori="Semua">Semua</button>
              </div>
            </div>
          </div>
          @foreach($kategoris as $kategori)
          <div class="col-2">
            <div class="border bg-warning">
              <div class="align-items-center text-center">
                <button class="btn btn-warning btn-kategori" data-kategori="{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</button>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row pt-5">
          @foreach($menuData as $menu)
          <div class="col-2 mb-3" data-kategori="{{ $menu->kategori->nama_kategori }}">
            <div class="border rounded-2 p-4 bg-warning">
              <div class="align-items-center mx-auto text-center">
                <img class="text-center" src="{{ asset('images/'.$menu->gambar_menu) }}" style="width: 100%;">
                <div class="d-block">
                  <label for="">{{ $menu->nama_menu }}</label>
                  <label for="">{{ 'Rp ' . number_format($menu->harga, 0, ',', '.') }}</label>
                  <button type="submit" class="btn btn-outlet mt-2">Tambah</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  </div>


  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
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
    document.addEventListener('DOMContentLoaded', function() {
      const menuItems = document.querySelectorAll('.col-2.mb-3');
      const kategoriButtons = document.querySelectorAll('.btn-kategori');

      kategoriButtons.forEach(button => {
        button.addEventListener('click', function() {
          const selectedKategori = this.getAttribute('data-kategori');

          menuItems.forEach(menuItem => {
            const kategoriMenu = menuItem.getAttribute('data-kategori');

            if (selectedKategori === 'Semua' || kategoriMenu === selectedKategori) {
              menuItem.style.display = 'block';
            } else {
              menuItem.style.display = 'none';
            }
          });
        });
      });
    });
  </script>


</body>

</html>