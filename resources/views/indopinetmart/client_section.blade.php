
<div class="clients py-1">
    <div class="client-slider-wrapper overflow-hidden position-relative">
        <div class="client-slider d-flex align-items-center">
            @for ($i = 0; $i < 2; $i++) {{-- Duplikasi untuk efek looping --}}
                @foreach([
                    'BMW.png', 'Agung_Podomoro_Land.png', 'AIA.png', 'Axis.png',
                    'Ayuta.png', 'BRI.png', 'Buyer.png', 'Cigna.png',
                    'CIMB_Niaga.png', 'Farobi.png', 'Frisian_Flag.png', 'Gudang_Garam.png',
                    'Mitsubishi.png', 'Telkom_Indonesia.png', 'The Agency.png', 'Tiva.png',
                    'Ultra_Jaya.png', 'Philip.png', 'Yamaha.png'
                ] as $logo)
                    <div class="client-logo mx-4">
                        <img src="{{ asset('tamplate/assets/img/suported/' . $logo) }}" class="img-fluid" alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}">
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</div>
