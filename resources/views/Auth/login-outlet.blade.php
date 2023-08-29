<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Alvanza Food Court</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{!! asset('backend/vendors/feather/feather.css')!!}">
    <link rel="stylesheet" href="{!! asset('backend/vendors/ti-icons/css/themify-icons.css')!!}">
    <link rel="stylesheet" href="{!! asset('backend/vendors/css/vendor.bundle.base.css')!!}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{!! asset('backend/css/vertical-layout-light/style.css')!!}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{!! asset('backend/images/satu.png')!!}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="{!! asset('backend/images/satu.svg') !!}" alt="logo" style="width: 30%;">
                            </div>
                            <div class="text-center">
                                <h4>Silahkan login sebagai outlet</h4>
                            </div>
                            <form class="pt-3" action="{{url('login-proses')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg"  name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn rounded-0" type="submit" name="submit">Login</button>
                                </div>
                                <div class="mb-2 mt-3">
                                    <a href="{{url('login')}}" class="btn btn-block btn-facebook auth-form-btn rounded-0">Login Admin</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{!! asset('backend/vendors/js/vendor.bundle.base.js')!!}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{!! asset('backend/off-canvas.js')!!}"></script>
    <script src="{!! asset('backend/js/hoverable-collapse.js')!!}"></script>
    <script src="{!! asset('backend/js/template.js')!!}"></script>
    <script src="{!! asset('backend/js/settings.js')!!}"></script>
    <script src="{!! asset('backendjs/todolist.js')!!}"></script>
    <!-- endinject -->
</body>

</html>