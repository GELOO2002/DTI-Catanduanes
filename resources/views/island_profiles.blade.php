<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Island Profiles Directory</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>
</head>
<body class="bg-slate-100 min-h-screen p-8 font-sans">

    <div class="max-w-6xl mx-auto">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-slate-800">Registered Island Profiles</h1>
            <p class="text-slate-600 mt-1">Manage local business owners, portfolios, and linked Facebook channels.</p>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($profiles as $profile)
                <div x-data="{ isOpen: false }" 
                     class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden h-fit transition-all duration-300 hover:shadow-md">
                    
                    <div class="relative h-52 bg-slate-700 bg-cover bg-center flex items-end p-4"
                         style="background-image: linear-gradient(to top, rgba(15, 23, 42, 0.95), rgba(15, 23, 42, 0.2)), url('/storage/{{ $profile->cover_image }}');">
                        
                        <div class="text-white">
                            <h2 class="text-xl font-bold tracking-wide uppercase">{{ $profile->name }}</h2>
                            <p class="text-sm text-slate-300 font-medium">Owner: {{ $profile->owner_name }}</p>
                        </div>
                    </div>

                    <div class="p-4 flex justify-between items-center bg-slate-50 border-b border-slate-100">
                        <div class="flex items-center gap-2 text-slate-600">
                            <svg class="h-4 w-4 fill-blue-600" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                            <span class="text-xs font-semibold uppercase tracking-wider text-slate-500 truncate max-w-[180px]">
                                {{ $profile->fb_page_name ? 'Connected' : 'No Connection' }}
                            </span>
                        </div>

                        <button @click="isOpen = !isOpen" 
                                class="p-1.5 hover:bg-slate-200 rounded-full transition-colors duration-200 text-slate-700 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 class="h-5 w-5 transform transition-transform duration-300" 
                                 :class="isOpen ? 'rotate-180' : 'rotate-0'" 
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>

                    <div x-show="isOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-cloak 
                         class="p-4 bg-white border-t border-slate-100 space-y-4">
                        
                        @if($profile->fb_page_url && $profile->fb_page_url !== '#')
    <div>
        <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Linked Page</h3>
        <a href="{{ $profile->fb_page_url }}" target="_blank" 
           class="text-xs font-semibold text-blue-600 hover:underline bg-blue-50 border border-blue-100 rounded-lg px-3 py-2 flex items-center justify-between">
            <span>{{ $profile->fb_page_name }}</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
            </svg>
        </a>
    </div>
@else
    <div>
        <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Linked Page</h3>
        <span class="text-xs font-semibold text-slate-400 bg-slate-100 rounded-lg px-3 py-2 block">
            No active Facebook link provided
        </span>
    </div>
@endif
                    

                        <div>
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Our Crafts Portfolio</h3>
                            <div class="flex gap-2 overflow-x-auto pb-2 snap-x scrollbar-thin">
                                @foreach($profile->products as $product)
                                    <div class="min-w-[100px] max-w-[100px] bg-slate-50 border border-slate-200 rounded-xl p-1.5 text-center snap-start flex-shrink-0">
                                        <div class="w-full h-14 bg-slate-300 rounded-lg flex items-center justify-center font-bold text-slate-600 text-xs uppercase mb-1">
                                            {{ substr($product->name, 0, 2) }}
                                        </div>
                                        <p class="text-[10px] font-bold text-slate-700 truncate" title="{{ $product->name }}">{{ $product->name }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-2 border-t border-slate-100">
                            <h3 class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1.5">Trade History Log</h3>
                            <ul class="space-y-1.5 text-[11px] text-slate-600">
                                @forelse($profile->tradeHistories as $history)
                                    <li class="flex items-start gap-1.5">
                                        <span class="text-emerald-500 mt-0.5">✓</span>
                                        <p><span class="text-slate-400 font-medium">{{ $history->created_at->format('M d') }}:</span> {{ $history->log_message }}</p>
                                    </li>
                                @empty
                                    <li class="text-slate-400 italic">No trade activities on record.</li>
                                @endforelse
                            </ul>
                        </div>

                    </div> </div>
            @endforeach
        </div>
    </div>

</body>
</html>