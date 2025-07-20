@isset($sidebarItems)
<div class="w-60 bg-white shadow-md p-4 h-full">
    <ul class="space-y-4">
        @foreach ($sidebarItems as $item)
            @php
                $currentUrl = url()->current();
                $isActive = $currentUrl === $item['route'] || str_starts_with($currentUrl, $item['route'] . '/');
                $textClass = $isActive ? 'text-purple-600 font-semibold' : 'text-gray-700';
            @endphp

            <li>
                @if (!empty($item['is_logout']))
                    <form action="{{ $item['route'] }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="flex items-center space-x-2 w-full text-left hover:text-red-600 {{ $textClass }}">
                            <i class="bi bi-{{ $item['icon'] }}"></i>
                            <span>{{ $item['name'] }}</span>
                        </button>
                    </form>
                @else
                    <a href="{{ $item['route'] }}" class="flex items-center space-x-2 hover:text-blue-600 {{ $textClass }}">
                        <i class="bi bi-{{ $item['icon'] }}"></i>
                        <span>{{ $item['name'] }}</span>
                    </a>
                @endif
            </li>
        @endforeach
    </ul>
</div>
@endisset
