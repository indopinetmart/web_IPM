<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'PinetMart')</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Bootstrap Icons --}}
    <link href="{{ url('tamplate/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to bottom right, #c26eff, #8400ff);
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .carousel-scroll {
            scroll-snap-type: x mandatory;
            scroll-behavior: smooth;
        }

        .carousel-scroll > img {
            scroll-snap-align: start;
        }
    </style>

    @stack('styles')
</head>

<body class="text-[#00332F] min-h-screen flex flex-col">

    {{-- Header --}}
    @include('pinetmart.partials.header')

    <div class="flex flex-1 w-full relative">

        {{-- Sidebar (Desktop Only) --}}
        <aside class="hidden md:block w-60 fixed left-0 top-14 bottom-0 z-30">
            @include('pinetmart.partials.sidebar')
        </aside>

        {{-- Main Content --}}
       <main class="flex-1 pt-6 pb-24 px-2 sm:px-4 lg:px-16 w-full">
            @yield('content')
        </main>

    </div>

    {{-- Bottom Navigation (Mobile Only) --}}
    <div class="block md:hidden fixed bottom-0 left-0 right-0 z-40 bg-white border-t shadow">
        @include('pinetmart.partials.bottomnav')
    </div>

    {{-- Auto Carousel Script --}}
    <script>
        function setupAutoCarousel(id, interval = 3000) {
            const container = document.getElementById(id);
            if (!container) return;

            const items = container.querySelectorAll('img');
            let index = 0;

            setInterval(() => {
                index = (index + 1) % items.length;
                container.scrollTo({
                    left: items[index].offsetLeft,
                    behavior: 'smooth'
                });
            }, interval);
        }

        document.addEventListener("DOMContentLoaded", () => {
            setupAutoCarousel('carousel-banner', 3000);
            setupAutoCarousel('carousel-best', 4000);
            setupAutoCarousel('carousel-rekomendasi', 5000);
        });
    </script>

    @stack('scripts')
</body>
</html>
