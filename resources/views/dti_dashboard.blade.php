<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTI Catanduanes</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

   <nav class="bg-[#8B5A2B] text-white shadow-md">
    <div class="flex justify-between items-center px-6 py-4 bg-[#8B5A2B] text-white">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/dti_bagongpinas.png') }}" alt="DTI Logo" class="h-16 w-auto">
            <h1 class="text-2xl font-bold tracking-wide">DTI Catanduanes</h1>
        </div>
        <div class="flex items-center gap-4">
            <span class="bg-white/10 text-xs uppercase px-3 py-1 rounded-full font-semibold tracking-widest">Live Monitoring Panel</span>

            <button type="button"
                    onclick="document.getElementById('dti-sidebar').classList.remove('-translate-x-full');
                             document.getElementById('dti-sidebar-overlay').classList.remove('hidden');"
                    class="flex flex-col gap-1.5 bg-transparent border-none cursor-pointer p-2">
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
                <span class="block w-6 h-0.5 bg-white"></span>
            </button>

        </div>
    </div>
</nav>

<div id="dti-sidebar-overlay"
     onclick="document.getElementById('dti-sidebar').classList.add('-translate-x-full');
              this.classList.add('hidden');"
     class="hidden fixed inset-0 bg-black/50 z-40">
</div>

<aside id="dti-sidebar"
       class="fixed top-0 left-0 h-full w-72 bg-white shadow-xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out overflow-y-auto">

     <div class="flex justify-between items-center px-6 py-4 bg-[#8B5A2B] text-white">
        <h2 class="font-bold text-lg">DTI Services</h2>
        <button type="button"
                onclick="document.getElementById('dti-sidebar').classList.add('-translate-x-full');
                         document.getElementById('dti-sidebar-overlay').classList.add('hidden');"
                class="bg-transparent border-none text-white text-2xl cursor-pointer leading-none">
            &times;
        </button>
    </div>

    <ul class="py-4">
        <li>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-gray-100 font-semibold">
                BNRS <span class="text-xs text-gray-400 font-normal">(Business Name Registration System)</span>
            </a>
        </li>
        <li>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-gray-100 font-semibold">
                CCA <span class="text-xs text-gray-400 font-normal">(Consumer Complaint Assistance)</span>
            </a>
        </li>
        <li>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-gray-100 font-semibold">
                BDD <span class="text-xs text-gray-400 font-normal">(Business Development Division)</span>
            </a>
        </li>
       <li>
    <button type="button" onclick="toggleNegosyoList()"
            class="w-full flex items-center justify-between px-6 py-3 text-gray-700 hover:bg-gray-100 font-semibold text-left bg-transparent border-none cursor-pointer">
        <span>Negosyo Center</span>
        <svg id="negosyo-chevron" class="w-4 h-4 transform transition-transform duration-200 text-gray-400"
             fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>

    <ul id="negosyo-list" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out bg-gray-50">
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">Virac</p>
        <p class="text-xs text-gray-500">DTI Provincial Office, Virac, Catanduanes
            <a href="http://facebook.com/DTICatanduanesofficial/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">Bato</p>
        <p class="text-xs text-gray-500">Libod Poblacion, Bato, Catanduanes
            <a href="https://batocatanduanes.gov.ph" target="_blank" class="text-blue-600 underline">(Official Website)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">Baras</p>
        <p class="text-xs text-gray-500">Municipal Hall, Baras, Catanduanes
            <a href="https://www.facebook.com/NC.lgubaras/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">San Andres</p>
        <p class="text-xs text-gray-500">Municipal Hall, San Andres, Catanduanes
            <a href="https://www.facebook.com/p/Negosyo-Center-San-Andres-100067604418969/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">Pandan</p>
        <p class="text-xs text-gray-500">Municipal Hall, Pandan, Catanduanes
            <a href="https://www.facebook.com/NegosyoCenterPandan/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100">
        <p class="font-semibold text-sm text-gray-800">Caramoran</p>
        <p class="text-xs text-gray-500">Municipal Hall, Caramoran, Catanduanes
            <a href="https://www.facebook.com/NCCaramoran/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
    <li class="px-6 py-2 border-t border-gray-100 pb-3">
        <p class="font-semibold text-sm text-gray-800">Viga</p>
        <p class="text-xs text-gray-500">Municipal Hall, Viga, Catanduanes
            <a href="https://www.facebook.com/NegosyoCenterViga/" target="_blank" class="text-blue-600 underline">(FB Page)</a>
        </p>
    </li>
</ul>
        <li>
            <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-gray-100 font-semibold">
                Fair Trade
            </a>
        </li>
    </ul>
</aside>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Catandunganon Products</h2>
            <p class="mt-2 text-sm text-gray-600">Registered local products by different business owners and event history.</p>
        </div>

       <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
    @foreach($products as $product)

                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col border border-gray-200">

                    {{-- CAROUSEL --}}
                    <div class="relative bg-gray-50 border-b border-gray-100">

             @php
    try {
        $galleryItems = is_array($product->gallery_items) ? $product->gallery_items : json_decode($product->gallery_items, true) ?? [];
        $allImages = [asset(trim($product->image))];

        foreach ($galleryItems as $item) {
            if (!empty($item['image_path'])) {
                $allImages[] = asset($item['image_path']);
            }
        }

        if (empty($allImages) || count($allImages) == 1) {
            $allImages = ['https://picsum.photos/id/20/400/300'];
        }

        $imageTitles = [$product->name];
        foreach ($galleryItems as $item) {
            if (!empty($item['name'])) {
                $imageTitles[] = $item['name'];
            }
        }
    } catch (\Exception $e) {
        $allImages = ['https://picsum.photos/id/20/400/300'];
        $imageTitles = [$product->name];
    }
@endphp

                        {{-- Navigation Buttons --}}
                        @if(count($allImages) > 1)
                            <button onclick="prevImage({{ $product->id }})"
                                    class="absolute left-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                                </svg>
                            </button>
                            <button onclick="nextImage({{ $product->id }})"
                                    class="absolute right-2 top-1/2 -translate-y-1/2 z-10 bg-white/80 hover:bg-white rounded-full w-8 h-8 flex items-center justify-center shadow-md">
                                <svg class="w-4 h-4 text-gray-700" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </button>
                        @endif

                        {{--
                            FIX: data-titles carries THIS product's own titles array.
                            Computed inline here, so it can never leak another product's
                            data the way the old script-tag version did.
                        --}}
                        <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar h-48"
                             id="carousel-{{ $product->id }}"
                             data-titles='@json($imageTitles)'
                             onscroll="updateDots({{ $product->id }}, {{ count($allImages) }})">

                            @foreach($allImages as $index => $imageUrl)
                                <div class="snap-center flex-shrink-0 w-full flex items-center justify-center bg-gray-100 carousel-item"
                                     data-index="{{ $index }}">
                                    <img src="{{ $imageUrl }}"
                                         alt="{{ $product->name }} photo {{ $index + 1 }}"
                                         class="h-full w-full object-contain drop-shadow-md"
                                         onerror="this.src='https://picsum.photos/id/20/400/300'">
                                </div>
                            @endforeach
                        </div>

                        {{-- Dot Indicators --}}
                        @if(count($allImages) > 1)
                            <div id="dots-{{ $product->id }}" class="absolute bottom-2 left-0 right-0 flex justify-center gap-1.5 z-10">
                                @foreach($allImages as $index => $imageUrl)
                                    <button type="button"
                                            onclick="scrollToImage({{ $product->id }}, {{ $index }})"
                                            class="carousel-dot w-2 h-2 rounded-full transition-colors {{ $index === 0 ? 'bg-gray-700' : 'bg-white/70 border border-gray-300' }}"
                                            data-index="{{ $index }}">
                                    </button>
                                @endforeach
                            </div>
                        @endif

                    </div>
                    {{-- END CAROUSEL --}}

                    {{-- PRODUCT INFO --}}
                    <div class="p-6 flex-1">
                        <h3 id="product-title-{{ $product->id }}" class="text-lg font-bold text-gray-900 leading-snug">
                            {{ $product->name }}
                        </h3>
                        <p class="text-sm font-semibold text-red-600 mt-1">{{ $product->business->name ?? 'No Business' }}</p>
                    </div>

                    {{-- CARD FOOTER --}}
                    <div class="px-6 pb-6 pt-4 border-t border-gray-100 bg-gray-50/50">

                        <button type="button"
                                onclick="event.stopPropagation(); event.preventDefault(); window.open('{{ $product->business->fb_page ?? '#' }}', '_blank'); return false;"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider rounded-lg transition-colors shadow-sm mb-4 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.8c4.56-.93 8-4.96 8-9.8z"/>
                            </svg>
                            Show Facebook Page
                        </button>

                        <button type="button"
                                onclick="toggleHistoryDrawer(event)"
                                class="w-full flex items-center justify-between text-xs text-gray-500 font-bold uppercase tracking-wider hover:text-gray-800 transition-colors focus:outline-none py-1 cursor-pointer bg-transparent">
                            <span>History</span>
                            <svg class="w-4 h-4 transform transition-transform duration-300 text-gray-400"
                                 fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out opacity-0">
                            <div class="mt-3 p-3 bg-white border border-gray-200 rounded-lg text-xs text-gray-600 leading-relaxed shadow-inner">
                                <strong class="text-gray-800 block mb-1 font-semibold">MSME Milestones:</strong>
                                {{ $product->history ?: 'No history available.' }}
                            </div>
                        </div>

                    </div>

                </div>
            @endforeach
        </div>
    </main>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <script>
        function toggleHistoryDrawer(event) {
            event.stopPropagation();
            const button = event.currentTarget;
            const drawer = button.nextElementSibling;
            const arrow  = button.querySelector('svg');
            const isOpen = drawer.style.maxHeight && drawer.style.maxHeight !== '0px';
            drawer.style.maxHeight = isOpen ? '0px' : drawer.scrollHeight + 'px';
            drawer.style.opacity   = isOpen ? '0'   : '1';
            arrow.classList.toggle('rotate-180', !isOpen);
        }
        function toggleNegosyoList() {
           const list = document.getElementById('negosyo-list');
           const chevron = document.getElementById('negosyo-chevron');
           const isOpen = list.style.maxHeight && list.style.maxHeight !== '0px';
              list.style.maxHeight = isOpen ? '0px' : list.scrollHeight + 'px';
              chevron.classList.toggle('rotate-180', !isOpen);
     }

        function scrollToImage(productId, index) {
            const carousel = document.getElementById('carousel-' + productId);
            if (carousel) {
                carousel.scrollTo({
                    left: carousel.clientWidth * index,
                    behavior: 'smooth'
                });
            }
        }

        function prevImage(productId) {
            const carousel = document.getElementById('carousel-' + productId);
            if (!carousel) return;
            const current = Math.round(carousel.scrollLeft / carousel.clientWidth);
            scrollToImage(productId, Math.max(0, current - 1));
        }

        function nextImage(productId) {
            const carousel = document.getElementById('carousel-' + productId);
            if (!carousel) return;
            const items = carousel.querySelectorAll('.carousel-item');
            const current = Math.round(carousel.scrollLeft / carousel.clientWidth);
            scrollToImage(productId, Math.min(items.length - 1, current + 1));
        }

        // FIX: titles now come from THIS carousel's own data-titles attribute,
        // never from a stale PHP loop variable shared across all products.
        function updateDots(productId, totalImages) {
            const carousel = document.getElementById('carousel-' + productId);
            const dots = document.getElementById('dots-' + productId);
            const titleHeading = document.getElementById('product-title-' + productId);

            if (!carousel || !dots) return;

            const activeIndex = Math.round(carousel.scrollLeft / carousel.clientWidth);

            let titles = [];
            try {
                titles = JSON.parse(carousel.dataset.titles || '[]');
            } catch (e) {
                titles = [];
            }

            dots.querySelectorAll('.carousel-dot').forEach((dot, i) => {
                if (i === activeIndex) {
                    dot.classList.remove('bg-white/70', 'border', 'border-gray-300');
                    dot.classList.add('bg-gray-700');
                } else {
                    dot.classList.remove('bg-gray-700');
                    dot.classList.add('bg-white/70', 'border', 'border-gray-300');
                }
            });

            if (titleHeading && titles[activeIndex]) {
                titleHeading.innerText = titles[activeIndex].toUpperCase();
            }
        }
    </script>

</body>
</html>