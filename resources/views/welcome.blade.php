@foreach($businesses as $business)
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        {{-- Product Image --}}
        <img src="{{ $business->product_image ?? 'https://via.placeholder.com/400x200' }}"
             alt="{{ $business->name }}"
             class="w-full h-48 object-cover">

        <div class="p-6">
            <h3 class="font-bold text-gray-900">{{ $business->name }}</h3>
            <p class="text-red-500 font-semibold text-sm">{{ $business->owner_name ?? '' }}</p>
            <p class="text-gray-600 text-sm mt-1">{{ $business->description ?? '' }}</p>

            {{-- ✅ CONNECT TO FB Button --}}
            @php
                $fbUrl = $business->fb_page ?? '';
                $isValidFb = !empty($fbUrl) && str_starts_with($fbUrl, 'http');
            @endphp

            @if($isValidFb)
                <button type="button"
                        onclick="event.stopPropagation(); window.open('{{ $fbUrl }}', '_blank');"
                        class="mt-4 flex items-center justify-center gap-2 w-full bg-blue-600 
                               hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl 
                               transition duration-200 border-none cursor-pointer">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                    CONNECT TO FB
                </button>
            @else
                <span class="text-gray-400 italic text-sm mt-4 block">
                    No Facebook link available
                </span>
            @endif

            {{-- Show Trade History Toggle --}}
            <button type="button"
                    onclick="this.nextElementSibling.classList.toggle('hidden')"
                    class="mt-3 w-full flex justify-between items-center 
                           text-gray-500 text-xs font-semibold uppercase tracking-widest 
                           py-2 border-t border-gray-100 bg-transparent border-none cursor-pointer">
                Show Trade History
                <span>▾</span>
            </button>
            <div class="hidden mt-2 text-sm text-gray-600">
                {{ $business->history ?? 'No history available.' }}
            </div>
        </div>
    </div>
@endforeach