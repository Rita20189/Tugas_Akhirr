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

    .custom-radio {
      display: none;
    }

    .custom-radio+label {
      display: inline-block;
      border: 2px solid #ac1e0b;
      border-radius: 4px;
      padding: 5px 10px;
      cursor: pointer;
    }

    .custom-radio:checked+label {
      background-color: #ac1e0b;
      color: white;
      border-color: #ac1e0b;
    }
  </style>
</head>

<body>
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
          <a href="{{ url('/pesan') }}/{{$id_pesanan}}" class="nav-item nav-link custom-link">Kembali</a>
        </div>
      </div>
    </nav>
    <form action="{{ url('get-pesanan') }}" method="POST">
      @csrf
      <div class="container-xxl py-5 hero-nav">
        <div class="container text-center">
          <div class="d-flex justify-content-center align-items-center text-center pt-5 pb-4">
            <div class="card rounded-3 mb-3 w-75">
              <div class="card-body bg-warning rounded-3">
                <div class="align-items-center text-center">
                  <div class="card">
                    <table class="table table-striped text-center bg-white border container">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th class="col-4">Item Pesanan</th>
                          <th class="col-3">Harga</th>
                          <th>Gambar</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($itemPesanan as $item)
                        <tr>
                          <td class="align-middle">{{$loop->iteration}}</td>
                          <td class="align-middle">{{$item->menu->nama_menu}}</td>
                          <td class="align-middle">Rp {{number_format($item->menu->harga, 0, ',', '.')}},-</td>
                          <td>
                            <img src="{{ asset('images/'.$item->menu->gambar_menu) }}" alt="" style="width: 40%;">
                          </td>
                          <td class="align-middle">
                            <form action="{{url('hapus-item')}}/{{$item->id}}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fa-regular fa-circle-xmark"></i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2" class=""><strong>Total Pesanan:</strong></td>
                          <td colspan="2"><strong>Rp {{ number_format($itemPesanan->sum(function($itemPesanan) { return $itemPesanan->total_harga; }), 0, ',', '.') }},-</strong></td>
                          <td></td>
                        </tr>
                      </tfoot>
                    </table>
                    @if($item->status === 0)
                    <div class="mb-3">
                      <form action="{{url('konfirmasi-pemesanan')}}/{{$id_pesanan}}" method="POST">
                        @csrf
                        <button onclick="return confirm('Apakah Anda yakin ingin mengonfirmasi pesanan?')" class="btn btn-danger rounded-0" type="submit">Konfirmasi Pemesanan</button>
                      </form>
                    </div>
                    @elseif($item->status === 1)
                    <h3>Pesanan telah terkonfirmasi</h3>
                    <div class="col-2 mx-auto row mb-3">
                      <a href="{{url('/')}}" class="btn btn-danger rounded-0">Kembali</a>
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row pt-5">
        </div>
    </form>

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



</body>

</html>