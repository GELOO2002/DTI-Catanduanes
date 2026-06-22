<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTI Catanduanes</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-[#0e2889] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold tracking-wide">DTI Catanduanes</h1>
            <span class="bg-white/10 text-xs uppercase px-3 py-1 rounded-full font-semibold tracking-widest">Live Monitoring Panel</span>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Catandunganon Products</h2>
            <p class="mt-2 text-sm text-gray-600">Registered local products by different business owners and event history.</p>
        </div>

        {{-- GRID: 1 col mobile → 2 col tablet → 3 col desktop --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)

                {{-- CARD: flex-col so footer always stays at bottom --}}
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col border border-gray-200">

                    {{-- Debugger Banner --}}
                    <div class="bg-black text-green-400 p-2 text-xs font-mono">
                        Raw Data: {{ var_export($product->gallery_images, true) }}
                    </div>

                    {{-- ── CAROUSEL IMAGE TRACK ── --}}
                    <div class="relative bg-gray-50 border-b border-gray-100 overflow-hidden">
                    
                          @php
    $images = ['https://picsum.photos/id/20/400/300'];
    <p style="color:red;font-size:20px;">TEST {{ count($images) }}</p>
@endphp

                        <div class="flex overflow-x-auto snap-x snap-mandatory scroll-smooth no-scrollbar"
                             id="carousel-{{ $product->id }}"
                             onscroll="updateDots({{ $product->id }})">

                            @foreach($images as $index => $img)
    <div class="snap-center shrink-0 w-full flex items-center justify-center p-4 h-48">
       <img src="{{ Str::startsWith($img, 'http') ? $img : asset('storage/' . $img) }}"
     alt="{{ $product->product_names ?? 'Product' }} photo {{ $index + 1 }}"
     class="h-full w-full object-contain drop-shadow-md">
    </div>
@endforeach
                        </div>

                        {{-- Navigation Dots --}}
                        @if(count($images) > 1)
                            <div id="dots-{{ $product->id }}" class="absolute bottom-2 left-0 right-0 flex justify-center gap-1.5 z-10">
                                @foreach($images as $index => $img)
                                    <button type="button"
                                            onclick="scrollToImage({{ $product->id }}, {{ $index }})"
                                            class="w-2 h-2 rounded-full border transition-all duration-200"
                                            style="{{ $index === 0 ? 'background-color: #374151; border-color: #374151;' : 'background-color: rgba(255, 255, 255, 0.7); border-color: #d1d5db;' }}">
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    {{-- ── END CAROUSEL ── --}}

                    {{-- ── PRODUCT INFO ── --}}
                    <div class="p-6 flex-1">
                        @php
                            $baseName = $product->product_names ?? $product->name ?? 'Unnamed Product';
                            $baseDesc = $product->description ?? '';
                            
                            $galleryNames = is_array($product->gallery_names) ? $product->gallery_names : (json_decode($product->gallery_names, true) ?? []);
                            $galleryDescs = is_array($product->gallery_descriptions) ? $product->gallery_descriptions : (json_decode($product->gallery_descriptions, true) ?? []);
                            
                            $namesArray = array_merge([$baseName], $galleryNames);
                            $descsArray = array_merge([$baseDesc], $galleryDescs);
                        @endphp

                        <h3 id="title-{{ $product->id }}"
                            data-names='@json($namesArray)'
                            data-descriptions='@json($descsArray)'
                            class="text-2xl font-bold text-gray-900 leading-snug">
                            {{ $baseName }}
                        </h3>
                        
                        <p class="text-lg font-semibold text-red-600 mt-1">
                            {{ $product->business->name ?? 'Unknown Business' }}
                        </p>
                        
                        <p id="desc-{{ $product->id }}" class="text-gray-600 text-xs mt-3 line-clamp-3 leading-relaxed">
                            {{ $baseDesc }}
                        </p>
                    </div>
                    {{-- ── END PRODUCT INFO ── --}}

                    {{-- ── CARD FOOTER ── --}}
                    <div class="px-6 pb-6 pt-4 border-t border-gray-100 bg-gray-50/50">

                        {{-- Facebook Button --}}
                        <button type="button"
                                onclick="event.stopPropagation(); event.preventDefault(); window.open('{{ $product->business->fb_page ?? '#' }}', '_blank'); return false;"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold uppercase tracking-wider rounded-lg transition-colors shadow-sm mb-4 cursor-pointer">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.8c4.56-.93 8-4.96 8-9.8z"/>
                            </svg>
                            Connect to FB
                        </button>

                        {{-- History Toggle Drawer --}}
                        <button type="button"
                                onclick="toggleHistoryDrawer(event)"
                                class="w-full flex items-center justify-between text-xs text-gray-500 font-bold uppercase tracking-wider hover:text-gray-800 transition-colors focus:outline-none py-1 cursor-pointer bg-transparent">
                            <span>History</span>
                            <svg class="w-4 h-4 transform transition-transform duration-300 text-gray-400" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        {{-- Collapsible History Content --}}
                        <div class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out opacity-0">
                            <div class="mt-3 p-3 bg-white border border-gray-200 rounded-lg text-xs text-gray-600 leading-relaxed shadow-inner">
                                <strong class="text-gray-800 block mb-1 font-semibold">MSME Milestones:</strong>
                                {{ $product->history ?: "Jaz Handicraft, a coco craft business owned by Mr. Jobel T. Cabrera and managed by his wife, Ms. Arlene P. Cabrera, started its journey in October 2018 with a simple dream and borrowed tools..." }}
                            </div>
                        </div>

                    </div>
                    {{-- ── END CARD FOOTER ── --}}

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

        function scrollToImage(productId, index) {
            const carousel = document.getElementById(`carousel-${productId}`);
            if (carousel) {
                const itemWidth = carousel.offsetWidth;
                carousel.scrollTo({ left: itemWidth * index, behavior: 'smooth' });
            }
        }

        function updateDots(productId) {
            const carousel = document.getElementById(`carousel-${productId}`);
            const dotsContainer = document.getElementById(`dots-${productId}`);
            const titleElement = document.getElementById(`title-${productId}`);
            const descElement = document.getElementById(`desc-${productId}`);
            
            if (!carousel) return;

            const scrollLeft = carousel.scrollLeft;
            const itemWidth = carousel.offsetWidth || carousel.clientWidth;
            if (!itemWidth) return;

            const activeIndex = Math.round(scrollLeft / itemWidth);

            // 1. Update swipe indicator dots with direct colors
            if (dotsContainer) {
                const buttons = dotsContainer.getElementsByTagName('button');
                for (let i = 0; i < buttons.length; i++) {
                    if (i === activeIndex) {
                        buttons[i].style.backgroundColor = '#374151';
                        buttons[i].style.borderColor = '#374151';
                    } else {
                        buttons[i].style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
                        buttons[i].style.borderColor = '#d1d5db';
                    }
                }
            }

            // 2. Synchronize Title and Descriptions smoothly on swipe
            if (titleElement) {
                try {
                    const names = JSON.parse(titleElement.getAttribute('data-names'));
                    if (names && names[activeIndex] !== undefined) {
                        titleElement.innerText = names[activeIndex];
                    }
                } catch(e) { console.error("Error parsing names JSON:", e); }
            }

            if (descElement && titleElement) {
                try {
                    const descs = JSON.parse(titleElement.getAttribute('data-descriptions'));
                    if (descs && descs[activeIndex] !== undefined) {
                        descElement.innerText = descs[activeIndex];
                    }
                } catch(e) { console.error("Error parsing descriptions JSON:", e); }
            }
        }
    </script>
</body>
</html>