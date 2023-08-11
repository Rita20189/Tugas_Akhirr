<!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
        <a href="" class="navbar-brand p-0">
            <div class="d-flex align-items-center">
                <!-- <img src="img/logo.png" alt="Logo"> -->
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
            @php
            // Impor facade Request
            use Illuminate\Support\Facades\Request;
            @endphp
            <!-- HTML for the navigation links -->
            <!-- HTML for the navigation links -->
            <div class="navbar-nav ms-auto py-0 pe-4">
                <a href="{{ url('/') }}" class="nav-item nav-link custom-link">Home</a>
                <a href="#about" class="nav-item nav-link custom-link">About</a>
                <a href="#service" class="nav-item nav-link custom-link">Service</a>
                <a href="#menu" class="nav-item nav-link custom-link">Menu</a>
                <a href="#contact" class="nav-item nav-link custom-link">Contact</a>
            </div>

            <a href="{{ url('login') }}" class="btn btn-primary py-2 px-4">Login</a>
        </div>
    </nav>
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Oiy sanak..<br>jan lupo singgah!</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Lezatnya makanan yang menggugah selera! Nikmati pengalaman kuliner tak terlupakan bersama kami. Sajikan dengan penuh cinta dan cita rasa, setiap hidangan adalah perpaduan sempurna antara rasa dan kualitas.</p>
                    <a href="{{ url('/pesan') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Pesan Sekarang</a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                    <img class="img-fluid" src="img/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->

<!-- JavaScript scripts and custom scripts go here -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // JavaScript code for handling active tab switching
        var navLinks = $(".custom-link");

        function setActiveLink(link) {
            navLinks.removeClass("active");
            link.addClass("active");
        }

        // Click event handler
        navLinks.on("click", function() {
            setActiveLink($(this));
        });

        // Intersection Observer for scroll-based active tab switching
        var observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var targetLink = navLinks.filter(`[href="${'#' + entry.target.id}"]`);
                    setActiveLink(targetLink);
                }
            });
        });

        // Observe each section
        $("section").each(function() {
            observer.observe(this);
        });

        // Manually check if the top section is in view on page load
        var homeLink = navLinks.eq(0); // Select the first link (Home)
        if ($(window).scrollTop() === 0) {
            setActiveLink(homeLink);
        }

        // Scroll event handler to set Home tab active when scrolling back to top
        $(window).scroll(function() {
            if ($(window).scrollTop() === 0) {
                setActiveLink(homeLink);
            }
        });
    });
</script>