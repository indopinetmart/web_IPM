<ul class="nav nav-tabs nav-tabs-features" data-aos="fade-up" data-aos-delay="100">
    @php
        $apps = [
            ['target' => 'features-tab-1', 'icon' => 'perwira_apps.png'],
            ['target' => 'features-tab-2', 'icon' => 'pioneer_apps.png'],
            ['target' => 'features-tab-3', 'icon' => 'pinetmart_apps.png'],
            ['target' => 'features-tab-4', 'icon' => 'quickresponse_apps.png'],
            ['target' => 'features-tab-5', 'icon' => 'gobank_apps.png'],
        ];
    @endphp

    @foreach ($apps as $index => $app)
        <li class="nav-item">
            <a class="nav-link d-flex flex-column align-items-center {{ $index === 0 ? 'active show' : '' }}"
                data-bs-toggle="tab" data-bs-target="#{{ $app['target'] }}">
                <img src="{{ asset('tamplate/assets/img/Icon_Apps/' . $app['icon']) }}" alt="icons_apps"
                    class="icons_apps" />
            </a>
        </li>
    @endforeach
</ul>



<div class="tab-content" data-aos="fade-up" data-aos-delay="200">

    <div class="tab-pane fade active show" id="features-tab-1">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>PERWIRA</h3>
                <span style="color: #ffd700; font-weight: bold;">Perhimpunan Wirausaha Indonesia</span>
                <!-- Tombol Download -->
                <div
                    class="mt-4 text-center d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-2">
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank"
                        class="btn btn-download-android">
                        <i class="bi bi-android2 me-1"></i> Download for Android
                    </a>
                    <a href="https://apps.apple.com/id/app/example-app/id123456789" target="_blank"
                        class="btn btn-download-ios">
                        <i class="bi bi-apple me-1"></i> Download on App Store
                    </a>

                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('tamplate/assets/img/logo/perwira.png') }}" alt="" class="img-fluid"
                    style="border: 3px solid purple; border-radius: 10px;">
            </div>
        </div>
    </div><!-- End Tab Content Item -->

    <div class="tab-pane fade" id="features-tab-2">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>PIONEER</h3>
                <span style="color: #ffd700; font-weight: bold;">Point Partners</span>

                <!-- Tombol Download -->
                <div
                    class="mt-4 text-center d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-2">
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank"
                        class="btn btn-download-android">
                        <i class="bi bi-android2 me-1"></i> Download for Android
                    </a>
                    <a href="https://apps.apple.com/id/app/example-app/id123456789" target="_blank"
                        class="btn btn-download-ios">
                        <i class="bi bi-apple me-1"></i> Download on App Store
                    </a>

                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('tamplate/assets/img/logo/point_pioneer.png') }}" alt="" class="img-fluid"
                    style="border: 3px solid purple; border-radius: 10px;">
            </div>
        </div>
    </div><!-- End Tab Content Item -->

    <div class="tab-pane fade" id="features-tab-3">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>MARKET PLACE</h3>
                <span style="color: #ffd700; font-weight: bold;">pinetmart Marketplace</span>

                <p style="color: #ffd700; text-align: justify;">
                    Indo Pinet Mart menyediakan layanan pembelanjaan dengan menggunakan Pi Coin,
                    dan membuka luas untuk member yang ingin bergabung menjadi seller dan bisa
                    berjualan dan bertransaksi menggunakan Pi Coin, semua transaksi menggunakan
                    aplikasi yang di sediakan PT. Indo PiNet Mart, Sisalhakan Download Aplikasinya.<br>
                    <br>
                    <b>Untuk Pendaftaran Member Dan Penjual tidak Dipungut Biaya Sedikit Pun.
                    </b><br>

                    <b>Product yang tersedia saat ini ;</b>
                </p>
                <ul>
                    <li><i class="bi bi-check2-all"></i> <span style="color: #000000;">
                            Unit Rumah di berbagai perumahan dengan lokasi yang strategis.
                        </span></li>
                    <li><i class="bi bi-check2-all"></i> <span style="color: #000000;">
                            Logam Mulia
                        </span></li>
                    <li><i class="bi bi-check2-all"></i> <span style="color: #000000;">
                            Unit Kendaraan Roda Empat.
                        </span>
                    </li>
                </ul>

                <!-- Tombol Download -->
                <div
                    class="mt-4 text-center d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-2">
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank"
                        class="btn btn-download-android">
                        <i class="bi bi-android2 me-1"></i> Download for Android
                    </a>
                    <a href="https://apps.apple.com/id/app/example-app/id123456789" target="_blank"
                        class="btn btn-download-ios">
                        <i class="bi bi-apple me-1"></i> Download on App Store
                    </a>
                </div>
            </div>

            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('tamplate/assets/img/logo/pinetmart.png') }}" alt="" class="img-fluid"
                    style="border: 3px solid purple; border-radius: 10px;">
            </div>
        </div>
    </div><!-- End Tab Content Item -->

    <div class="tab-pane fade" id="features-tab-4">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>QUICK RESPONSE</h3>
                <span style="color: #ffd700; font-weight: bold;">Recovery Is possible Team</span>
                <!-- Tombol Download -->
                <div
                    class="mt-4 text-center d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-2">
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank"
                        class="btn btn-download-android">
                        <i class="bi bi-android2 me-1"></i> Download for Android
                    </a>
                    <a href="https://apps.apple.com/id/app/example-app/id123456789" target="_blank"
                        class="btn btn-download-ios">
                        <i class="bi bi-apple me-1"></i> Download on App Store
                    </a>

                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('tamplate/assets/img/logo/panic_button.png') }}" alt="" class="img-fluid"
                    style="border: 3px solid purple; border-radius: 10px;">
            </div>
        </div>
    </div><!-- End Tab Content Item -->

    <div class="tab-pane fade" id="features-tab-5">
        <div class="row">
            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                <h3>GO Bank</h3>
                <span style="color: #ffd700; font-weight: bold;">Recovery Is possible Team</span>

                <!-- Tombol Download -->
                <div
                    class="mt-4 text-center d-flex flex-column flex-md-row justify-content-center align-items-stretch gap-2">
                    <a href="https://play.google.com/store/apps/details?id=com.example.app" target="_blank"
                        class="btn btn-download-android">
                        <i class="bi bi-android2 me-1"></i> Download for Android
                    </a>
                    <a href="https://apps.apple.com/id/app/example-app/id123456789" target="_blank"
                        class="btn btn-download-ios">
                        <i class="bi bi-apple me-1"></i> Download on App Store
                    </a>

                </div>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="{{ asset('tamplate/assets/img/logo/Go_bank_banner.png') }}" alt=""
                    class="img-fluid" style="border: 3px solid purple; border-radius: 10px;">
            </div>
        </div>
    </div><!-- End Tab Content Item -->

</div>
