<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catanduangan Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-2">Catanduangan Products</h1>
        <p class="text-gray-600 mb-12">Registered local products by different business owners and event history.</p>

        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-lg p-8 mb-12">
                <!-- Product Image Carousel -->
                <div class="mb-8">
                    @if($product->image)
                        <div class="relative w-full">
                            <img id="mainImage-{{ $product->id }}" 
                                 src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}"
                                 class="w-full h-96 object-cover rounded-lg">
                            
                            <!-- Carousel Navigation -->
                            @if($product->gallery && count(json_decode($product->gallery, true) ?? []) > 0)
                                <button onclick="previousImage('{{ $product->id }}')" 
                                        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    ❮
                                </button>
                                <button onclick="nextImage('{{ $product->id }}')" 
                                        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    ❯
                                </button>
                            @endif
                        </div>
                    @else
                        <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                            <p class="text-gray-500">No image available</p>
                        </div>
                    @endif
                </div>

                <!-- Product Details -->
                <div class="mb-8">
                    <h2 class="text-3xl font-bold mb-2">{{ $product->name }}</h2>
                    
                    @if($product->business)
                        <p class="text-xl font-bold text-red-600 mb-4">{{ $product->business->name }}</p>
                    @endif

                    @if($product->description)
                        <p class="text-gray-700 mb-6">{{ $product->description }}</p>
                    @endif

                    <!-- Facebook Button -->
                    <button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg flex items-center justify-center gap-2 mb-6">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        CONNECT TO FB
                    </button>
                </div>

                <!-- History Section -->
                @if($product->history)
                    <div class="border-t pt-6">
                        <button onclick="toggleHistory('{{ $product->id }}')" 
                                class="w-full text-left font-bold text-gray-700 py-3 px-4 bg-gray-100 hover:bg-gray-200 rounded-lg flex justify-between items-center">
                            <span>HISTORY</span>
                            <span id="historyIcon-{{ $product->id }}" class="text-xl">▼</span>
                        </button>
                        <div id="historyContent-{{ $product->id }}" class="hidden mt-4 p-4 bg-gray-50 rounded-lg">
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $product->history }}</p>
                        </div>
                    </div>
                @endif
            </div>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No products available yet.</p>
            </div>
        @endforelse
    </div>

    <script>
        function nextImage(productId) {
            // To be implemented
        }

        function previousImage(productId) {
            // To be implemented
        }

        function toggleHistory(productId) {
            const content = document.getElementById('historyContent-' + productId);
            const icon = document.getElementById('historyIcon-' + productId);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.textContent = '▲';
            } else {
                content.classList.add('hidden');
                icon.textContent = '▼';
            }
        }
    </script>
</body>
</html>