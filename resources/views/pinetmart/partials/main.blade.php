<main class="pt-4 md:pt-6 pb-24 md:pb-10 px-4 md:px-8 md:ml-60 md:max-w-screen-2xl md:mx-auto w-full">
    <div class="w-full relative space-y-4">

        {{-- Search --}}
        <div class="mt-6 md:mt-6">
            <input type="text" placeholder="Cari barang atau jasa..."
                   class="w-full border border-gray-300 rounded px-4 py-2 text-sm focus:outline-none focus:ring focus:border-blue-300">
        </div>

        {{-- Banner Carousel --}}
        <div class="rounded shadow overflow-hidden relative">
            <div id="carousel-banner" class="relative flex gap-2 overflow-x-auto carousel-scroll scrollbar-hide">
                @for ($i = 0; $i < 5; $i++)
                    <img class="min-w-full sm:min-w-[420px] h-52 md:h-60 object-cover rounded"
                         src="{{ asset('tamplate/assets/img/banner/mobil.jpg') }}" alt="Banner {{ $i + 1 }}">
                @endfor
            </div>
        </div>

        {{-- Kategori --}}
        <section class="bg-white px-4 py-2 rounded shadow w-full">
            <h2 class="text-base sm:text-lg font-semibold mb-2">Kategori</h2>
            <div class="relative overflow-x-auto carousel-scroll scrollbar-hide">
                <div class="flex space-x-6 min-w-max">
                    @foreach ([['car-front', 'Mobil'], ['house-door', 'Properti'], ['phone', 'Handphone'], ['laptop', 'Elektronik'], ['bicycle', 'Sepeda'], ['briefcase', 'Jasa']] as [$icon, $name])
                        <div class="flex flex-col items-center text-xs sm:text-sm">
                            <i class="bi bi-{{ $icon }} text-lg sm:text-xl mb-1"></i>
                            <span>{{ $name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- Produk Terbaik --}}
        <section class="bg-white px-4 py-2 rounded shadow w-full">
            <h2 class="text-base sm:text-lg font-semibold mb-2">Produk Terbaik</h2>
            <div class="relative flex space-x-3 sm:space-x-4 overflow-x-auto carousel-scroll scrollbar-hide">
                @for ($i = 0; $i < 5; $i++)
                    <img class="w-36 sm:w-40 h-36 sm:h-40 object-cover rounded"
                         src="{{ asset('tamplate/assets/img/produk/rumah_' . $i . '.png') }}"
                         alt="Produk Terbaik {{ $i + 1 }}">
                @endfor
            </div>
        </section>

        {{-- Rekomendasi Baru --}}
        <section class="bg-white px-4 py-2 rounded shadow w-full">
            <h2 class="text-base sm:text-lg font-semibold mb-2">Rekomendasi Baru</h2>
            <div class="relative flex space-x-3 sm:space-x-4 overflow-x-auto carousel-scroll scrollbar-hide">
                @for ($i = 2; $i <= 6; $i++)
                    <img class="w-36 sm:w-40 h-36 sm:h-40 object-cover rounded"
                         src="{{ asset('tamplate/assets/img/produk/mobil_' . $i % 6 . '.png') }}"
                         alt="Rekomendasi {{ $i }}">
                @endfor
            </div>
        </section>

        {{-- Semua Produk --}}
        <section class="bg-white px-4 py-2 rounded shadow w-full">
            <h2 class="text-base sm:text-lg font-semibold mb-3">Semua Produk</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                @for ($i = 1; $i <= 10; $i++)
                    @php
                        $isMobil = $i % 2 === 0;
                        $kategori = $isMobil ? 'mobil' : 'rumah';
                        $imageIndex = $i % 5 === 0 ? 5 : $i % 5;
                    @endphp
                    <div class="bg-gray-100 p-2 rounded shadow-sm transition hover:shadow-md">
                        <img class="w-full h-28 sm:h-32 object-cover rounded"
                             src="{{ asset("tamplate/assets/img/produk/{$kategori}_{$imageIndex}.png") }}"
                             alt="Produk {{ $i }}">
                        <h3 class="mt-2 text-xs sm:text-sm font-medium">{{ ucfirst($kategori) }} {{ $i }}</h3>
                        <p class="text-xs text-gray-500">Rp {{ number_format($i * 100000, 0, ',', '.') }}</p>
                    </div>
                @endfor
            </div>
        </section>

    </div>
</main>
