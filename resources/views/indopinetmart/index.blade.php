<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<!-- HEADER -->
@include('indopinetmart.header')

<body class="index-page global-background">

    <!-- Background Gambar -->
    <div
        style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        z-index: -1;
        overflow: hidden;
        object-position: top center;
    ">
        <img src="{{ asset('tamplate/assets/img/background_abu.png') }}" alt="Background"
            style="width: 100%; height: 100%; object-fit: cover;" />
    </div>

    @include('indopinetmart.topbar')

    <main class="main position-relative">


        <!-- Hero Section -->
        <section id="hero" class="hero section ">
            @include('indopinetmart.hero_section')
        </section><!-- /Hero Section -->

        <!-- About Section -->

        @include('indopinetmart.abaout')


        <!-- Stats Section -->
        <section id="stats" class="stats section">

            @include('indopinetmart.stats_section')

        </section><!-- /Stats Section -->

        <!-- Services Section -->
        <section id="services" class="services section">
            @include('indopinetmart.service_section')
        </section><!-- /Services Section -->


        <!-- Features Section -->
        <section id="features" class="features section">
            <div class="container">
                @include('indopinetmart.featur_section')
            </div>
        </section><!-- /Features Section -->

        {{-- <!-- Services 2 Section -->
        <section id="services-2" class="services-2 section light-background">
            @include('layouts.service_2_section')
        </section><!-- /Services 2 Section --> --}}

        <!-- Testimonials Section -->
        <section id="testimonials" class="testimonials section dark-background">
            @include('indopinetmart.testimoni_section')
        </section><!-- /Testimonials Section -->

        <!-- Portfolio Section -->
        <section id="portfolio" class="portfolio section">
            @include('indopinetmart.portofolio_section')
        </section><!-- /Portfolio Section -->

        {{-- <!-- Team Section -->
        <section id="team" class="team section light-background">
            @include('layouts.section_team')
        </section><!-- /Team Section --> --}}

        {{-- <!-- Contact Section -->
        <section id="contact" class="contact section">
            @include('layouts.contact')
        </section><!-- /Contact Section --> --}}


        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">
            @include('indopinetmart.client_section')
        </section><!-- /Clients Section -->
    </main>

    <footer class="footer-custom text-white pt-5 pb-3">
        @include('indopinetmart.foother')
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader">
        <img src="{{ asset('tamplate/assets/img/logo/logopt.png') }}" alt="Loading..." class="preloader-logo">
        <div class="preloader-text">
            <span class="purple-shadow">Indo</span>
            <span class="gold-shadow">Pinet</span>
            <span class="purple-shadow">Mart</span>
        </div>
    </div>

    <!-- SCRIPT  -->
    @include('indopinetmart.script_layout')
</body>

</html>
