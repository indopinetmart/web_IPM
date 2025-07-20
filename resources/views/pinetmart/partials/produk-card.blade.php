@php
    $kategori = $kategori ?? 'mobil';
    $index = $index ?? 1;
@endphp
<div class="bg-gray-100 p-2 rounded">
    <img class="w-full h-32 object-cover rounded"
         src="{{ asset("tamplate/assets/img/produk/{$kategori}_{$index}.png") }}"
         alt="{{ ucfirst($kategori) }} {{ $index }}">
    <h3 class="mt-2 text-sm font-medium">{{ ucfirst($kategori) }} {{ $index }}</h3>
    <p class="text-xs text-gray-500">Rp {{ number_format($index * 100000, 0, ',', '.') }}</p>
</div>
