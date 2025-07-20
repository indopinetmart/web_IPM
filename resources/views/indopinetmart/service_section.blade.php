<div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
                <div class="img">
                    <img src="{{ asset('tamplate/assets/img/logo/person.png') }}" class="img-fluid" alt=""
                        style="border: 4px solid #3B14A4; border-radius: 10px;">
                </div>
                <div class="details position-relative">
                    <div class="icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <a href="javascript:void(0)" class="stretched-link" data-bs-toggle="modal"
                        data-bs-target="#personModal">
                        <h3>Person</h3>
                    </a>
                    <p class="text-center fw-semibold mb-0">
                    <h6>Selengkapnya...</h6>
                    </p>
                </div>
            </div>
        </div><!-- End Service Item -->


        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
                <div class="img">
                    <img src="{{ asset('tamplate/assets/img/logo/partner.png') }}" class="img-fluid" alt=""
                        style="border: 4px solid #3B14A4; border-radius: 10px;">
                </div>
                <div class="details position-relative">
                    <div class="icon">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <a href="javascript:void(0)" class="stretched-link" data-bs-toggle="modal"
                        data-bs-target="#partnerModal">
                        <h3>Partner</h3>
                    </a>
                    <p class="text-center fw-semibold mb-0">
                    <h6>Selengkapnya...</h6>
                    </p>
                </div>
            </div>
        </div><!-- End Service Item -->


        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
                <div class="img">
                    <img src="{{ asset('tamplate/assets/img/logo/proses.png') }}" class="img-fluid" alt=""
                        style="border: 4px solid #3B14A4; border-radius: 10px;">
                </div>
                <div class="details position-relative">
                    <div class="icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <a href="javascript:void(0)" class="stretched-link" data-bs-toggle="modal"
                        data-bs-target="#prosesModal">
                        <h3>Proses</h3>
                    </a>
                    <p class="text-center fw-semibold mb-0">
                    <h6>Selengkapnya...</h6>
                    </p>
                </div>
            </div>
        </div><!-- End Service Item -->

        <div class="col-xl-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
                <div class="img">
                    <img src="{{ asset('tamplate/assets/img/logo/trade.png') }}" class="img-fluid" alt=""
                        style="border: 4px solid #3B14A4; border-radius: 10px;">
                </div>
                <div class="details position-relative">
                    <div class="icon">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <a href="javascript:void(0)" class="stretched-link" data-bs-toggle="modal"
                        data-bs-target="#tradeModal">
                        <h3>Trade</h3>
                    </a>
                    <p class="text-center fw-semibold mb-0">
                    <h6>Selengkapnya...</h6>
                    </p>
                </div>
            </div>
        </div><!-- End Service Item -->
    </div>

</div>



<div class="modal fade" id="personModal" tabindex="-1" aria-labelledby="personModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content"
            style="
                background: url('{{ asset('tamplate/assets/img/background_abu.png') }}') no-repeat center center;
                background-size: cover;
                position: relative;
                color: #000;
                border-radius: 0.5rem;
                overflow: hidden;
            ">
            <!-- Overlay putih transparan -->
            <div
                style="
                    position: absolute;
                    inset: 0;
                    background: rgba(255, 255, 255, 0.1);
                    z-index: 0;
                ">
            </div>

            <!-- Konten modal -->
            <div style="position: relative; z-index: 1;">
                <div class="modal-header gold-glow">
                    <h5 class="modal-title" id="personModalLabel">Detail Person</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3">
                            @foreach (range(1, 8) as $i)
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 text-center">
                                    <img src="{{ asset('tamplate/assets/img/person/person' . $i . '.png') }}"
                                        alt="Foto Person {{ $i }}" class="img-fluid rounded"
                                        style="border: 3px solid gold;" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal"
                        style="background-color: #FFD700; color: #000; border: none; font-weight: 600; padding: 6px 16px; border-radius: 4px;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="partnerModal" tabindex="-1" aria-labelledby="partnerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content"
            style="
                background: url('{{ asset('tamplate/assets/img/background_abu.png') }}') no-repeat center center;
                background-size: cover;
                position: relative;
                color: #000;
                border-radius: 0.5rem;
                overflow: hidden;
            ">
            <!-- Overlay putih transparan -->
            <div
                style="
                    position: absolute;
                    inset: 0;
                    background: rgba(255, 255, 255, 0.1);
                    z-index: 0;
                ">
            </div>

            <!-- Konten modal -->
            <div style="position: relative; z-index: 1;">
                <div class="modal-header gold-glow">
                    <h5 class="modal-title" id="partnerModalLabel">Detail Pertner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3">
                            .............
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal"
                        style="background-color: #FFD700; color: #000; border: none; font-weight: 600; padding: 6px 16px; border-radius: 4px;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="prosesModal" tabindex="-1" aria-labelledby="prosesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content"
            style="
                background: url('{{ asset('tamplate/assets/img/background_abu.png') }}') no-repeat center center;
                background-size: cover;
                position: relative;
                color: #000;
                border-radius: 0.5rem;
                overflow: hidden;
            ">
            <!-- Overlay putih transparan -->
            <div
                style="
                    position: absolute;
                    inset: 0;
                    background: rgba(255, 255, 255, 0.1);
                    z-index: 0;
                ">
            </div>

            <!-- Konten modal -->
            <div style="position: relative; z-index: 1;">
                <div class="modal-header gold-glow">
                    <h5 class="modal-title" id="prosesModalLabel">Detail Pertner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3">
                            <p style="color:#FFE031FF; text-align: justify;">
                                Meresponpermintaan informasi dari departemen atau tim yang membutuhkan.
                                Menyiapkan cadangan data sebagai bagian dari upaya preventif bila terjadi
                                kesalahandata.<br>
                                membuat laporan terkait data pemohon untuk keperluan internal atau untuk
                                dipresentasikan kepada pihak terkait.<br>
                                analisa data dapat dilakukan dengan membandingkan data yang dikumpulkan dengan
                                sumberlain atau dengan mengecek kembali data tersebut dengan sumber yang terpercaya.
                                digunakan untuk memastikan kebenaran data <br>
                                <br>
                                Jenis Data yang Dikelola:<br>
                                Data Pribadi:Data seperti nama, alamat, nomor telepon, dan informasi kontak lainnya.<br>
                                Data Permohonan:Informasi terkait permohonan yang diajukan, seperti jenis permohonan,
                                tanggal
                                permohonan,
                                dan dokumen pendukung.<br>
                                Data Proses:Informasi terkait status permohonan, progres, dan perkembangan
                                permohonan.<br>
                                <br>
                                HASIL :<br>
                                Hijau : Data pemohon baru dan update kelengkapan data untuk proses selanjutnya<br>
                                Biru :Data pemohon sudah melewati proses analis dan update utnuk proses selanjutnya<br>
                                Merah: Data pemohon sudah mengikutiproses dengan hasil buruk<br>
                                Ungu: Data pemohon sudah mengikuti proses dengan hasl baik<br>
                                Kuning: Data pemohon yang belum mengikuti proses/pending<br>
                            <div class="text-center">
                                <b class="text text-danger">

                                </b>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal"
                        style="background-color: #FFD700; color: #000; border: none; font-weight: 600; padding: 6px 16px; border-radius: 4px;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="tradeModal" tabindex="-1" aria-labelledby="tradeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content"
            style="
                background: url('{{ asset('tamplate/assets/img/background_abu.png') }}') no-repeat center center;
                background-size: cover;
                position: relative;
                color: #000;
                border-radius: 0.5rem;
                overflow: hidden;
            ">
            <!-- Overlay putih transparan -->
            <div
                style="
                    position: absolute;
                    inset: 0;
                    background: rgba(255, 255, 255, 0.1);
                    z-index: 0;
                ">
            </div>

            <!-- Konten modal -->
            <div style="position: relative; z-index: 1;">
                <div class="modal-header gold-glow">
                    <h5 class="modal-title" id="tradeModalLabel">Detail Pertner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="row g-3">
                            <h5><b style="color: #FFE031FF;"> Key Performance Indicator PT.Indo PiNet-Mart </b></h5>
                            <p style="color: #FFE031FF; text-align: justify;">
                                SMART
                                <br>
                                a. Sapa melayani dengan santun dan proaktif serta mengedepankan etika dan
                                kehati-hatian.<br>
                                b. Manusiawi memberikan kesetaraan pelayanan kepada siapapun.<br>
                                c. Analis memberikan arah dan tujuanya menguntungkan kedua belah pihak dalam bentuk
                                digital.<br>
                                d. Rasional menjalankan kewajiban sesuai kebijakan organisasi dan kodeetik, dengan
                                mengedepankan
                                kerja sama yang berasaskan kebersamaan.<br>
                                e. Tekhnologi selalu berinovasi dan menjadi terdepan dalam bidang digita lpelayanan.<br>
                                <br>
                                ONE STOP SERVICE <br>
                                UMKM Eco-sistem digital. Ruang lingkup kehidupan untuk sekitar Kawasan menjadi
                                kesetaraan bisnis.
                            <div class="text-center">
                                <b class="text text-danger">

                                </b>
                            </div>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm" data-bs-dismiss="modal"
                        style="background-color: #FFD700; color: #000; border: none; font-weight: 600; padding: 6px 16px; border-radius: 4px;">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
