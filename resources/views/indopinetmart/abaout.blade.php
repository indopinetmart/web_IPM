        <section id="about" class="about section">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        {{-- <h3 class="gold-glow-heading">Indo Pinet Mart</h3> --}}




                        <div class="image-with-text mt-4 position-relative">
                            <img src="{{ asset('tamplate/assets/img/logo/aboutkoin.jpg') }}" class="img-fluid rounded-4"
                                alt="">

                            {{-- Logo PT Indo PiNetMart --}}
                            <img src="{{ asset('tamplate/assets/img/logo/logopt.png') }}" alt="Logo PT"
                                style="
                                    position: absolute;
                                    top: 65%;
                                    left: 80%;
                                    transform: translate(-50%, -100%);
                                    width: clamp(30px, 10vw, 60px);
                                    height: auto;
                                    z-index: 1;
                                    animation: spin 7s linear infinite, shimmer 5s ease-in-out infinite;
                                    box-shadow: 0 0 8px rgba(255,215,0,0.6), 0 0 15px rgba(255,239,143,0.5), 0 0 20px rgba(255,215,0,0.4);
                                    border-radius: 50%;
                                ">

                            <div class="overlay-text top-text mt-1">Indo PiNet Mart</div>
                            <div class="overlay-text bottom-text">Pay with Pi</div>
                        </div>



                    </div>

                    <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="250">
                        <div class="content ps-0 ps-lg-5 mt-3 mt-lg-8">
                            <p style="color:#FFE031FF; text-align: justify;">
                                PT.Indo PiNet-Mart yang bergerak dalam memberikan
                                penyelenggaraan layanan pengelolaan dalam Meningkatkan
                                Pelayanan Kemandirian Ekonomi dengan konsep digital telah
                                berkontribusi secara nyata, di antaranya:
                            </p>
                            <ul>
                                <li><i class="bi bi-check-circle-fill"></i>
                                    <span style="color:#FFE031FF; text-align: justify;">
                                        Mewujudkan Kepuasan Masyarakat
                                        Memberikan penyediaan fasilitas dan
                                        memberikan penyelenggaraan layanan pengelolaan
                                        dalam Meningkatkan Pelayanan Kemandirian Ekonomi dengan konsep digital
                                        yang dibutuhkan Masyarakat;
                                    </span>
                                </li>

                                <li><i class="bi bi-check-circle-fill"></i>
                                    <span style="color:#FFE031FF; text-align: justify;">
                                        Meningkatkan Kualitas Pelayanan
                                        Berkomitmen melakukan peningkatan berkelanjutan dalam memberikan pelayanan
                                        terbaik kepada para pelanggan dan stakeholder,sesuai peraturan
                                        perundang-undangan yang berlaku.
                                        Standar Pelayanan Minimal,selanjutnya disingkat SPM
                                        yang ditetapkan PTIndoPiNet-Mart ini bertujuan pula untu kmemenuhi;<br>
                                        a.informasi yang akurat mengenai Produk;<br>
                                        b.pelayanan sesuai dengan standar;<br>
                                        c.perlindungan hukum dan keamanan;<br>
                                        d.Penetapan Tujuan Penyusunan SPM, telah ditetapkan.

                                    </span>
                                </li>
                            </ul>
                            <button type="button" class="btn btn-sm btn-primary rounded-pill px-4 py-2 btn-gold-glow"
                                data-bs-toggle="modal" data-bs-target="#infoModal">
                                Selengkapnya
                            </button>

                            {{-- <div class="position-relative mt-2 text-center">
                                <img src="{{ asset('tamplate/assets/img/about-2.jpg') }}" class="img-fluid rounded-4"
                                    style="width: 100%; max-height: 300px; object-fit: cover;" alt="">

                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                    class="glightbox pulsating-play-btn"></a>


                            </div> --}}



                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content"
                    style="
        background-image: url('{{ asset('tamplate/assets/img/background_abu.png') }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        color: #fff;
    ">
                    <div class="modal-header gold-glow" style="border-bottom: 1px solid rgba(255,255,255,0.2);">
                        <h5 class="modal-title" id="infoModalLabel">Informasi Lengkap</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>

                    <div class="modal-body" style="backdrop-filter: blur(2px);">
                        <p style="color:#FFE031FF; text-align: justify;">
                            indo PiNet Mart diprakarsai oleh salah satu pioneer pi di Indonesia. PiNet Mart adalah
                            marketplace dari PT Indo PiNet Mart yang didirikan secara resmi pada hari Jumat, 02 Februari
                            2024, dengan Nomor AHU-0026671.AH.01.11.TAHUN 2024 dan nomor NPWP 03.762.990.4-021.000 dan
                            NIB 1302240019392

                            PiNet Mart hadir sebagai one stop mart untuk dari aktifitas harian Anda hingga gaya hidup
                            Anda. indo PiNet Mart hadir untuk Semua yang Anda butuhkan. Silahkan berbelanja di Pi Net
                            Mart.

                            PT indo PiNet Mart saat ini berlokasi di Jl. H. Agus Salim No. 57, Kel. Kebon Sirih, Kec.
                            Menteng, Jakarta Pusat, DKI JAKARTA, 10340.
                        </p>

                        <div class="text-center mt-3">
                            <b class="text text-dark">
                                <b>Untuk menjadi member indo PiNet mart tidak dipungut biaya.</b>
                            </b>
                        </div>
                    </div>

                    <div class="modal-footer" style="border-top: 1px solid rgba(136, 1, 204, 0.2);">
                        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
