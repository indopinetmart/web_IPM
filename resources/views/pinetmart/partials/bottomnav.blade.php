@isset($sidebarItems)
<nav class="fixed bottom-0 left-0 right-0 z-40 bg-white border-t shadow md:hidden flex justify-around py-2 text-sm text-gray-700">
    @foreach ($sidebarItems as $item)
        @php
            $currentUrl = url()->current();
            $isActive = $currentUrl === $item['route'] || str_starts_with($currentUrl, $item['route'] . '/');
            $iconClass = $isActive ? 'bi-' . $item['icon'] . '-fill' : 'bi-' . $item['icon'];
            $textClass = $isActive ? 'text-purple-600 font-semibold' : 'text-gray-700';
        @endphp

        @if (!empty($item['is_logout']))
            <form action="{{ $item['route'] }}" method="POST" class="flex flex-col items-center {{ $textClass }}">
                @csrf
                <button type="submit" class="flex flex-col items-center focus:outline-none">
                    <i class="bi {{ $iconClass }} text-lg"></i>
                    <span class="text-xs">{{ $item['name'] }}</span>
                </button>
            </form>
        @else
            <a href="{{ $item['route'] }}" class="flex flex-col items-center relative {{ $textClass }}">
                <i class="bi {{ $iconClass }} text-lg"></i>
                <span class="text-xs">{{ $item['name'] }}</span>

                @if ($item['name'] === 'Notif')
                    <span class="absolute -top-1 right-0 bg-red-500 text-white text-xs px-1 rounded-full">5</span>
                @endif
            </a>
        @endif
    @endforeach
</nav>
@endisset
