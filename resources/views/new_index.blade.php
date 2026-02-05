<!DOCTYPE html>
<html lang="id">
{{-- Update test --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowy WO | Wedding Organizer</title>

    <link rel="icon" href="{{ env('APP_ADMIN') . '/storage/' . $settings->favicon }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=BBH+Bogle&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css?v=1.0.1') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm" id="mainNavbar">
        <div class="container">
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" id="navScrollspy">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#profile">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>

            <a class="navbar-brand d-flex align-items-center ms-auto" href="#home">
                <img src="{{ asset('wedding/logo/glowywo2.png') }}" alt="Glowy Logo" id="navLogoImg"
                    style="height: 50px;">
            </a>
        </div>
    </nav>

    <section id="home" class="hero position-relative overflow-hidden p-0">
        <!-- Background Carousel -->
        <div id="heroCarousel" class="carousel slide hero-bg" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                @foreach ($homepage->images as $index => $image)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}"
                        style="background-image: url('{{ env('APP_ADMIN') . '/storage/' . $image->image_path }}');">
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Overlay -->
        <div class="hero-overlay"></div>

        <!-- Content -->
        <div class="container hero-content text-center" data-aos="fade-up">
            <span class="decorator-text">Elegance in</span>

            <h1 class="display-huge">EVERY DETAIL</h1>

            <p class="lead-hero mb-5">
                Wujudkan kemewahan pernikahan<br>
                <span>impian bersama Glowy WO.</span>
            </p>

            <div class="glass-button-container d-inline-flex gap-3">
                <a href="#profile" id="btn-scroll" class="btn btn-burgundy-scroll rounded-pill px-5">
                    <i class="bi bi-arrow-down"></i> Scroll
                </a>

                <button class="btn btn-white-video rounded-pill px-4" data-bs-toggle="modal"
                    data-bs-target="#videoModal">
                    <i class="bi bi-play-circle-fill"></i> Watch Video
                </button>
            </div>
        </div>

    </section>

    <div class="modal fade" id="videoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0 p-0 mb-2">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="ratio ratio-16x9 shadow-lg overflow-hidden rounded-4">
                        <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Wedding Video"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="profile" class="our-identity-section">
        <div class="container position-relative h-100">
            <div class="row align-items-center h-100">
                <!-- Title -->
                <div class="col-lg-7" data-aos="fade-right">
                    <h2 class="section-title">
                        <span class="script-text">Our</span>
                        <span class="bold-text">Identity</span>
                    </h2>
                </div>

                <!-- Description Box -->
                <div class="col-lg-5 mt-4 mt-lg-0" data-aos="fade-left">
                    <div class="identity-box">
                        {!! $identity->subtitle !!}
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="services" class="services-section">
        {{-- <div class="services-overlay"></div> --}}
        <div class="container position-relative">
            <div class="text-center services-header mb-7" data-aos="fade-up">
                <h2 class="section-title">
                    <span class="script-text">Our</span>
                    <span class="bold-text">Services</span>
                </h2>
                <p class="services-subtitle mx-auto">
                    {{ $serviceSection->subtitle }}
                </p>
            </div>

            <div class="row g-4 justify-content-center align-items-stretch">
                @foreach ($serviceSection->services as $index => $service)
                    <div class="col-md-4"
                        data-aos="{{ $index === 0 ? 'fade-right' : ($index === 1 ? 'zoom-in' : 'fade-left') }}"
                        data-aos-delay="{{ ($index + 1) * 100 }}">

                        <div
                            class="service-card {{ $service->is_recommend ? 'service-featured' : 'shadow-sm' }} text-center h-100">
                            @if ($service->is_recommend)
                                <div class="badge-featured">Recommended</div>
                            @endif

                            <div class="service-icon {{ $service->is_recommend ? 'shadow' : '' }}">
                                <i class="{{ $service->icon }}"></i>
                            </div>

                            <h4>{{ $service->title }}</h4>

                            <p class="text-muted small">
                                {{ $service->description }}
                            </p>

                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <section id="portfolio" class="portfolio-section">
        <div class="container">

            <!-- Title -->
            <div class="portfolio-header text-center mb-5">
                <h2 class="section-title">
                    <span class="script-text">Our</span>
                    <span class="bold-text">Portfolio</span>
                </h2>
                <p class="portfolio-desc">
                    {{ $portfolio->subtitle }}
                </p>
            </div>

            <!-- Portfolio Grid -->
            {{-- <div class="portfolio-grid">

                <!-- Big Left -->
                <div class="portfolio-item large">
                    <img src="{{ asset('wedding/portfolio/img-1.jpg') }}" alt="Wedding Portfolio">
                </div>

                <!-- Tall Right -->
                <div class="portfolio-item tall">
                    <img src="{{ asset('wedding/portfolio/img-2.jpg') }}" alt="Wedding Portfolio">
                </div>

                <!-- Bottom Left -->
                <div class="portfolio-item small">
                    <img src="{{ asset('wedding/portfolio/img-3.jpg') }}" alt="Wedding Portfolio">
                </div>

                <!-- Bottom Center -->
                <div class="portfolio-item small">
                    <img src="{{ asset('wedding/portfolio/img-4.jpg') }}" alt="Wedding Portfolio">
                </div>

                <!-- Bottom Right -->
                <div class="portfolio-item small">
                    <img src="{{ asset('wedding/portfolio/img-5.jpg') }}" alt="Wedding Portfolio">
                </div>

            </div> --}}

            <div id="portfolioSplide" class="splide portfolio-splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach ($portfolio->images as $image)
                            <li class="splide__slide">
                                <div class="portfolio-slide">
                                    <img src="{{ env('APP_ADMIN') . '/storage/' . $image->image_path }}"
                                        alt="Wedding Portfolio">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="container position-relative">
            <!-- CTA Banner -->
            <div class="contact-cta mb-5" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <h2 class="section-title">
                            <span class="script-text">Our</span>
                            <span class="bold-text">Platform</span>
                        </h2>
                        <p class="contact-desc">
                            {{ $platform->subtitle }}
                        </p>
                        <a href="#contact-form" class="btn btn-contact">Contact</a>
                    </div>

                    <div class="col-lg-4 d-none d-lg-block text-end model-wrapper">
                        {{-- <img src="{{ asset('assets/bg_talent.svg') }}" alt="Glowy Consultant" class="contact-model"> --}}
                        <img src="{{ env('APP_ADMIN') . '/storage/' . $platform->image_path }}"
                            alt="Glowy Consultant" class="contact-model">
                    </div>
                </div>
            </div>

            <!-- Contact Content -->
            <div class="row g-4" id="contact-form">

                <!-- Office Info -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="contact-office">
                        <h4>Glowy Office</h4>

                        <ul class="office-list">
                            <li>
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ $settings->address }}
                            </li>
                            <li>
                                <i class="bi bi-telephone-fill"></i>
                                {{ $settings->whatsapp }}
                            </li>
                            <li>
                                <i class="bi bi-envelope-fill"></i>
                                {{ $settings->email }}
                            </li>
                        </ul>

                        <div class="office-map">
                            <iframe src="https://www.google.com/maps?q=Jl.%20TB%20Simatupang%20Cilandak&output=embed"
                                allowfullscreen="" loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="contact-form-box">
                        <form>
                            <div class="mb-3">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama">
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Masukkan Email">
                            </div>

                            <div class="mb-4">
                                <label>Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Masukkan Pesan"></textarea>
                            </div>

                            <button type="submit" class="btn btn-submit">Kirim</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>


    {{-- <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0 small opacity-75">© 2026 {{ $settings->company_name }}. Powered by Passion & Luxury.</p>
    </footer> --}}

    <footer class="glowy-footer">
        <div class="container">
            <div class="row">

                <!-- Brand -->
                <div class="col-md-4 mb-4">
                    <h3 class="footer-brand">GLOWY WO</h3>
                    <p class="footer-desc">
                        {{ $settings->subtitle }}
                    </p>
                    <p class="footer-tagline">
                        {{ $settings->tagline }}
                    </p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 mb-4 offset-md-1">
                    <h6 class="footer-title">Quick Links</h6>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#profile">About Us</a></li>
                        <li><a href="#services">Our Services</a></li>
                        <li><a href="#portfolio">Portfolio</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div class="col-md-4 mb-4">
                    <h6 class="footer-title">Follow Us</h6>

                    <div class="footer-social">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-tiktok"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>

                    <img src="{{ env('APP_ADMIN') . '/storage/' . $settings->logo }}" alt="Glowy Logo"
                        class="footer-logo">
                </div>

            </div>

            <div class="footer-divider"></div>

            <p class="footer-copy">
                © 2015 {{ $settings->company_name }}. All Rights Reserved.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        document.getElementById('btn-scroll').addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 50,
                    behavior: 'smooth'
                });
            }
        });

        window.addEventListener('scroll', function() {
            const nav = document.getElementById('mainNavbar');
            const navCollapse = document.getElementById('navbarNav');

            if (window.scrollY > 80) {
                nav.classList.add('scrolled');
                // Saat scrolled, menu rata kanan (ms-auto)
                navCollapse.classList.remove('justify-content-center');
                navCollapse.classList.add('justify-content-end');
            } else {
                nav.classList.remove('scrolled');
                // Saat di atas, menu rata tengah (justify-content-center)
                navCollapse.classList.remove('justify-content-end');
                navCollapse.classList.add('justify-content-center');
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            new Splide('#portfolioSplide', {
                type: 'loop',
                focus: 'center',
                perPage: 3,
                gap: '24px',
                autoplay: true,
                interval: 3000,
                pauseOnHover: true,
                arrows: true,
                pagination: false,
                breakpoints: {
                    991: {
                        perPage: 1,
                    }
                }
            }).mount();
        });
    </script>
</body>

</html>
