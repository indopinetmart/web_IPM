<div id="{{ $id }}" class="flex space-x-4 overflow-x-auto carousel-scroll scrollbar-hide">
    @foreach ($images as $src)
        <img class="w-40 h-40 object-cover rounded" src="{{ asset($src) }}" alt="Gambar">
    @endforeach
</div>
