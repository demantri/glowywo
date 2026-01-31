<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glowy WO | Wedding Organizer</title>

    <link rel="icon" href="{{ asset('wedding/logo/glowy-favicon.png') }}" type="image/png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --burgundy: #750533;
            --magenta: #FF0080;
            --gold: #FFC022;
            --light-cream: #FDF8F2;
            --dark: #1a1a1a;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 75px;
        }

        /* Logic Navbar Center ke Right */
        @media (min-width: 992px) {

            /* Saat di posisi atas: sembunyikan brand, dorong menu ke tengah */
            .navbar:not(.scrolled) .container {
                justify-content: center;
            }

            .navbar:not(.scrolled) .navbar-brand {
                display: none;
                /* Benar-benar dihilangkan agar tidak memakan space kiri */
            }

            .navbar:not(.scrolled) .navbar-collapse {
                flex-grow: 0;
            }

            /* Saat sudah di-scroll: kembalikan ke standar bootstrap (brand kiri, menu kanan) */
            .navbar.scrolled .container {
                justify-content: 沟通;
                /* Default bootstrap */
            }
        }

        body {
            font-family: 'Poppins', sans-serif;
            /* Regular 400 */
            background-color: var(--light-cream);
            color: var(--dark);
            font-weight: 400;
        }

        /* TIPOGRAFI SESUAI PERMINTAAN */
        h1,
        .display-2 {
            font-weight: 800 !important;
            /* BBH (Extra Bold) */
            letter-spacing: -1px;
        }

        h2.section-title,
        .navbar-brand,
        h3 {
            font-weight: 700 !important;
            /* BOGLE (Bold) */
        }

        .navbar-brand {
            letter-spacing: 1px;
        }

        .btn-glowy,
        .nav-link {
            font-weight: 400;
            /* Semi-Bold */
        }

        /* Navbar */
        .navbar {
            background-color: transparent !important;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 1.5rem 0;
        }

        .navbar .nav-link {
            color: white !important;
        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.98) !important;
            padding: 0.6rem 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .navbar.scrolled .navbar-brand {
            opacity: 1;
            visibility: visible;
            transform: translateX(0);
        }

        .navbar.scrolled .nav-link {
            color: var(--dark) !important;
        }

        /* Warna hamburger saat transparan */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
            background-color: rgba(255, 255, 255, 0.1);
        }

        .navbar.scrolled .nav-link {
            color: var(--dark) !important;
        }

        .navbar.scrolled .nav-link:hover {
            color: var(--magenta) !important;
        }

        /* Penyesuaian warna hamburger menu saat transparan */
        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar.scrolled .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            opacity: 0;
            visibility: hidden;
            transition: all 0.4s ease;
            transform: translateX(-20px);
            /* Efek slide masuk */
        }

        #navbarNav {
            transition: all 0.5s ease;
        }

        @media (min-width: 992px) {
            .navbar:not(.scrolled) .navbar-collapse {
                display: flex !important;
                justify-content: center !important;
            }

            .navbar:not(.scrolled) .ms-auto {
                margin-left: 0 !important;
                margin-right: 0 !important;
            }
        }

        /* .nav-link {
            color: var(--dark) !important;
            margin: 0 15px;
        } */

        .nav-link:hover {
            color: var(--magenta) !important;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(190, 43, 104, 0.6), rgba(0, 0, 0, 0.5)),
                url('{{ asset('wedding/hero.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        /* Section Styling */
        section {
            padding: 100px 0;
            overflow: hidden;
        }

        .section-title {
            font-size: 3rem;
            color: var(--burgundy);
            margin-bottom: 40px;
            position: relative;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 60px;
            height: 4px;
            background: var(--gold);
            margin: 15px auto 0;
        }

        /* Membuat section profil memenuhi layar */
        #profile {
            min-height: 100vh;
            display: flex;
            align-items: center;
            /* Vertikal center */
            padding: 0;
            /* Menghilangkan padding default agar benar-benar full */
        }

        /* Mengatur ukuran teks agar sesuai dengan desain gambar */
        #profile .section-title {
            font-size: 3.5rem;
            /* Ukuran BBH */
            margin-bottom: 0.5rem;
        }

        /* Garis dekorasi warna Golden Joy di bawah judul (sesuai gambar) */
        .title-line {
            width: 80px;
            height: 4px;
            background-color: var(--gold);
            margin-bottom: 2rem;
        }

        /* List profil dengan border Magenta */
        .profile-border {
            border-left: 4px solid var(--magenta);
            padding-left: 20px;
        }

        /* Profile & Portfolio */
        .profile-border {
            border-left: 5px solid var(--magenta);
            padding-left: 25px;
        }

        .portfolio-card {
            border-radius: 15px;
            overflow: hidden;
            border: none;
            height: 300px;
            position: relative;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .portfolio-card:hover {
            transform: translateY(-10px);
        }

        .portfolio-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .portfolio-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(transparent, var(--burgundy));
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 25px;
            opacity: 0;
            transition: 0.4s;
        }

        .portfolio-card:hover .portfolio-overlay {
            opacity: 1;
        }

        @media (max-width: 768px) {
            .portfolio-card {
                height: 220px;
            }

            .section-title {
                font-size: 2.2rem;
            }
        }

        /* Service Card Styling */
        #services .row {
            display: flex;
            align-items: stretch;
            /* Memaksa semua kolom punya tinggi yang sama */
        }

        .service-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* Konten tetap di tengah secara vertikal */
            background: white;
            border-radius: 25px;
            padding: 40px 30px;
            transition: all 0.4s ease;
            border: 1px solid rgba(117, 5, 51, 0.1);
        }

        .service-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 40px rgba(117, 5, 51, 0.1) !important;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: var(--light-cream);
            color: var(--magenta);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
            transition: 0.3s;
        }

        .service-card:hover .service-icon {
            background: var(--burgundy);
            color: var(--gold);
        }

        .service-card h4 {
            font-weight: 700;
            /* Bogle Bold */
            color: var(--burgundy);
            margin-bottom: 15px;
        }

        /* Styling kartu khusus yang menonjol */
        .service-featured {
            background: var(--burgundy) !important;
            color: white !important;
            /* Kita gunakan scale yang lebih kecil agar tidak memotong padding container */
            transform: scale(1.05);
            z-index: 2;
            box-shadow: 0 15px 40px rgba(117, 5, 51, 0.4) !important;
        }

        .service-featured h4 {
            color: var(--gold) !important;
        }

        .service-featured .text-muted {
            color: rgba(255, 255, 255, 0.8) !important;
        }

        .service-featured .service-icon {
            background: var(--gold) !important;
            color: var(--burgundy) !important;
        }

        @media (max-width: 768px) {
            .service-featured {
                transform: scale(1);
                margin: 20px 0;
            }
        }

        /* Badge untuk memperkuat produk unggulan */
        .badge-featured {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--gold);
            color: var(--burgundy);
            padding: 5px 20px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.8rem;
            text-transform: uppercase;
        }

        /* Responsif: matikan skala di layar kecil agar tidak tumpang tindih */
        @media (max-width: 768px) {
            .service-featured {
                transform: scale(1);
                margin-top: 20px;
                margin-bottom: 20px;
            }
        }

        /* Contact & Footer */
        .contact-box {
            background: var(--burgundy);
            color: white;
            padding: 40px;
            border-radius: 20px;
        }

        .btn-glowy {
            background-color: var(--magenta);
            color: white;
            border: none;
            padding: 12px 35px;
            border-radius: 10px;
            transition: 0.3s;
        }

        .btn-glowy:hover {
            background-color: var(--gold);
            color: var(--burgundy);
            transform: translateY(-3px);
        }

        .btn-outline-light:hover {
            background-color: var(--gold);
            color: var(--burgundy);
            border-color: var(--gold);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top" id="mainNavbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('wedding/logo/glowywo2.png') }}" alt="Glowy WO Logo" height="45">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-lg-2"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item mx-lg-2"><a class="nav-link" href="#profile">Profile</a></li>
                    <li class="nav-item mx-lg-2"><a class="nav-link" href="#services">Our Services</a></li>
                    <li class="nav-item mx-lg-2"><a class="nav-link" href="#events">Portfolio</a></li>
                    <li class="nav-item mx-lg-2"><a class="nav-link" href="#contact">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero p-0">
        <div class="container text-center" data-aos="fade-up">
            <h1 class="display-2">Elegance in Every Detail</h1>
            <p class="lead fs-4 mb-5 opacity-90">Wujudkan kemewahan pernikahan impian bersama Glowy WO.</p>

            <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
                <a href="#profile" id="btn-scroll" class="btn btn-glowy px-5 py-3 fs-5 shadow-lg">
                    Lihat Selengkapnya <i class="bi bi-arrow-down-short ms-1"></i>
                </a>

                <button class="btn btn-outline-light px-5 py-3 fs-5 border-2 shadow-lg" data-bs-toggle="modal"
                    data-bs-target="#videoModal">
                    <i class="bi bi-play-circle me-2"></i> Video Event
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

    <section id="profile">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-right">
                    <img src="{{ asset('wedding/img-2.jpg') }}"
                        class="img-fluid rounded-5 shadow-lg" alt="Profile Gallery">
                </div>

                <div class="col-md-6 ps-md-5 mt-5 mt-md-0" data-aos="fade-left">
                    <h2 class="section-title text-start text-burgundy">Our Identity</h2>
                    <div class="title-line"></div>
                    <div class="profile-border">
                        <p class="mb-4">
                            <strong>Glowy</strong> hadir sebagai partner yang mendampingi setiap perjalanan menuju hari
                            bahagia setiap pasangan. Kami akan terus bertumbuh bersama setiap calon pasangan dan menjaga
                            kepercayaan serta komitmen kami kepada setiap calon pengantin. Glowy menghadirkan konsep
                            yang orisinal dan personal serta didukung dengan kerja profesional dan youthful spirit, kami
                            merancang setiap pernikahan dengan sepenuh hati, hangat, terkonsep, dan berkesan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Our Services</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">Kami menyediakan berbagai layanan profesional
                    untuk memastikan setiap tahap pernikahan Anda berjalan dengan sempurna.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-4 mb-3 mb-md-0" data-aos="fade-right" data-aos-delay="100">
                    <div class="service-card shadow-sm text-center h-100">
                        <div class="service-icon">
                            <i class="bi bi-calendar-heart"></i>
                        </div>
                        <h4>Wedding Planner</h4>
                        <p class="text-muted small">Glowy akan memberikan pendampingan secara professional untuk kamu
                            dari awal sampai dengan hari pernikahan. Kami akan membantu Menyusun konsep, timeline,
                            anggaran serta berkoordinasi dengan semua vendor. Glowy akan memastikan wedding dream kamu
                            terkonsep dan terkendali secara waktu maupun anggaran.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="service-card service-featured text-center p-5 shadow-lg h-100">
                        <div class="badge-featured">Recommended</div>
                        <div class="service-icon shadow">
                            <i class="bi bi-gift-fill"></i>
                        </div>
                        <h4>All In Package</h4>
                        <p class="small">Solusi praktis untuk kamu yang menginginkan pernikahan elegan tanpa harus
                            mengurus banyak hal. Semua kebutuhan pernikahan telah kami siapkan dalam satu paket.</p>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0" data-aos="fade-left" data-aos-delay="300">
                    <div class="service-card shadow-sm text-center h-100">
                        <div class="service-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h4>Wedding On The Day</h4>
                        <p class="text-muted small">Sudah menyiapkan semuanya sendiri? Glowy hadir untuk memastikan
                            hari pernikahan kamu berjalan dengan lancar tanpa kendala.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="events">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Portfolio</h2>
                <p class="text-muted mx-auto" style="max-width: 600px;">
                    Setiap pasangan memiliki kisah cinta yang unik dan istimewa. Glowy ingin berbagi momen-momen bahagia yang telah kami dampingi dan rancang dengan sepenuh hati, penuh detail serta disesuaikan dengan cerita setiap pasangan.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-1.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Classic Rose</h5>
                            <p class="small">Indoor Wedding</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-2.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Burgundy Night</h5>
                            <p class="small">Luxury Gala</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-3.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>White Pearl</h5>
                            <p class="small">Church Ceremony</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-4.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Summer Bliss</h5>
                            <p class="small">Outdoor Party</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-5.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Classic Rose</h5>
                            <p class="small">Indoor Wedding</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-6.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Burgundy Night</h5>
                            <p class="small">Luxury Gala</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-7.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>White Pearl</h5>
                            <p class="small">Church Ceremony</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="portfolio-card shadow-sm"><img
                            src="{{ asset('wedding/portfolio/img-8.jpg') }}"
                            class="portfolio-img">
                        <div class="portfolio-overlay text-white">
                            <h5>Summer Bliss</h5>
                            <p class="small">Outdoor Party</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="lead text-muted mx-auto" style="max-width: 600px;">
                    Konsultasikan rencana pernikahan kamu, kami siap mendampingi.
                    Hubungi Glowy sekarang
                </p>
            </div>

            <div class="row mb-5" data-aos="zoom-in">
                <div class="col-12">
                    <div class="rounded-4 overflow-hidden shadow-lg" style="height: 400px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.7999815067687!2d106.79532297887874!3d-6.290000245295207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10029e39241%3A0x766f6cd89bb7d89!2sGlowy%20Wedding!5e0!3m2!1sen!2sid!4v1768641570180!5m2!1sen!2sid"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-box shadow h-100 d-flex flex-column justify-content-center">
                        <h3 class="mb-4 text-white">Glowy Office</h3>
                        <div class="d-flex mb-4">
                            <i class="bi bi-geo-alt-fill me-3 fs-4 text-warning"></i>
                            <p class="mb-0">{{ $settings->address }}</p>
                        </div>
                        <div class="d-flex mb-4">
                            <i class="bi bi-telephone-fill me-3 fs-4 text-warning"></i>
                            <p class="mb-0">{{ $settings->phone }}</p>
                        </div>
                        <div class="d-flex mb-0">
                            <i class="bi bi-envelope-fill me-3 fs-4 text-warning"></i>
                            <p class="mb-0">{{ $settings->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <div class="bg-white p-4 p-md-5 rounded-4 shadow h-100">
                        <h3 class="mb-4" style="color: var(--burgundy);">Konsultasi Gratis</h3>
                        <form>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Nama Lengkap</label>
                                <input type="text" class="form-control bg-light" placeholder="Masukkan nama Anda">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" class="form-control bg-light" placeholder="email@contoh.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Pesan</label>
                                <textarea class="form-control bg-light" rows="4" placeholder="Rencana pernikahan Anda..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-glowy w-100 py-3 mt-2">Kirim Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white text-center py-4">
        <p class="mb-0 small opacity-75">© 2026 {{ $settings->company_name }}. Powered by Passion & Luxury.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>

</html>
