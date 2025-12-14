<section class="py-16" id="bookmark">
    <div class="max-w-7xl mx-auto px-6">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-[#0C2B4E] dark:text-blue-400 mb-4">
                <i class="fas fa-bookmark mr-2"></i>Simpanan Saya
            </h2>
            <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                Makanan dan minuman favorit yang telah Anda simpan untuk pemesanan yang lebih mudah
            </p>
            <div class="w-20 h-1 bg-[#0C2B4E] dark:bg-blue-400 mx-auto mt-4 rounded-full"></div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 transition-colors duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Total Simpanan</p>
                        <p class="text-2xl font-bold text-[#0C2B4E] dark:text-blue-400">{{ $totalBookmarks ?? '0' }} Item</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center">
                        <i class="fas fa-bookmark text-blue-600 dark:text-blue-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 transition-colors duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Makanan Tersimpan</p>
                        <p class="text-2xl font-bold text-[#0C2B4E] dark:text-green-400">{{ $foodBookmarks ?? '0' }} Item</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center">
                        <i class="fas fa-utensils text-green-600 dark:text-green-400 text-xl"></i>
                    </div>
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700 transition-colors duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">Minuman Tersimpan</p>
                        <p class="text-2xl font-bold text-[#0C2B4E] dark:text-purple-400">{{ $drinkBookmarks ?? '0' }} Item</p>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center">
                        <i class="fas fa-coffee text-purple-600 dark:text-purple-400 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookmarks Grid -->
        @if($bookmarks && count($bookmarks) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($bookmarks as $bookmark)
                    @php
                        $product = $bookmark->product;
                        $categoryClass = $product->category->name === 'Minuman' 
                            ? 'bg-blue-500 dark:bg-blue-600' 
                            : 'bg-green-500 dark:bg-green-600';
                        $categoryIcon = $product->category->name === 'Minuman' ? 'fa-glass-water' : 'fa-utensils';
                    @endphp
                    
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg hover:shadow-xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2">
                        <!-- Product Image -->
                        <div class="relative h-48 overflow-hidden rounded-t-xl">
                            <img 
                                src="{{ $product->image_path ? asset('storage/' . $product->image_path) : 'https://source.unsplash.com/300x200/?food,' . Str::slug($product->name) }}" 
                                class="w-full h-full object-cover hover:scale-110 transition-transform duration-300"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >
                            <!-- Bookmark Button -->
                            <button 
                                wire:click="toggleBookmark({{ $product->id }})"
                                class="absolute top-3 right-3 w-10 h-10 bg-white dark:bg-gray-800 rounded-full flex items-center justify-center shadow hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
                                title="Hapus dari Simpanan"
                            >
                                <i class="fas fa-bookmark text-red-500 dark:text-red-400"></i>
                            </button>
                            <!-- Category Badge -->
                            <span class="absolute top-3 left-3 {{ $categoryClass }} text-white px-2 py-1 text-xs font-bold rounded-full">
                                <i class="fas {{ $categoryIcon }} mr-1"></i>
                                {{ $product->category->name }}
                            </span>
                            <!-- Saved Time -->
                            <span class="absolute bottom-3 left-3 bg-black/50 dark:bg-gray-900/80 text-white dark:text-gray-200 px-2 py-1 text-xs rounded-full">
                                <i class="far fa-clock mr-1"></i>
                                {{ $bookmark->created_at->diffForHumans() }}
                            </span>
                        </div>

                        <!-- Product Info -->
                        <div class="p-4">
                            <h3 class="font-bold text-lg text-[#0C2B4E] dark:text-blue-400 mb-2 line-clamp-1">
                                {{ $product->name }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3 line-clamp-2">
                                {{ $product->description }}
                            </p>
                            
                            <!-- Rating & Price -->
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center">
                                    <div class="flex text-yellow-400 dark:text-yellow-500">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="text-gray-700 dark:text-gray-300 text-sm ml-1">4.8</span>
                                </div>
                                <span class="font-bold text-[#0C2B4E] dark:text-blue-400 text-lg">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </span>
                            </div>

                            <!-- Action Buttons -->
                            <div>
                                <button 
                                    wire:click="$dispatch('openProductDetail', { productId: {{ $product->id }} })"
                                    class="flex-1 px-3 py-2 bg-[#0C2B4E] dark:bg-blue-600 text-white text-sm rounded-lg hover:bg-[#163e6d] dark:hover:bg-blue-700 transition-colors font-medium"
                                >
                                    <i class="fas fa-info-circle mr-1"></i> Detail
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($bookmarks->hasPages())
                <div class="mt-8 flex justify-center">
                    <nav class="flex items-center gap-2">
                        @if($bookmarks->onFirstPage())
                            <span class="w-10 h-10 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg text-gray-400 dark:text-gray-500">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $bookmarks->previousPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif

                        @foreach(range(1, $bookmarks->lastPage()) as $page)
                            @if($page == $bookmarks->currentPage())
                                <span class="w-10 h-10 flex items-center justify-center bg-[#0C2B4E] dark:bg-blue-600 text-white rounded-lg font-medium">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $bookmarks->url($page) }}" class="w-10 h-10 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        @if($bookmarks->hasMorePages())
                            <a href="{{ $bookmarks->nextPageUrl() }}" class="w-10 h-10 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="w-10 h-10 flex items-center justify-center border border-gray-300 dark:border-gray-600 rounded-lg text-gray-400 dark:text-gray-500">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                        @endif
                    </nav>
                </div>
            @endif

        @else
            <!-- Empty State -->
            <div class="text-center py-16 bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 dark:border-gray-700 transition-colors duration-300">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                    <i class="fas fa-bookmark text-gray-300 dark:text-gray-500 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-300 mb-2">Belum ada simpanan</h3>
                <p class="text-gray-500 dark:text-gray-400 mb-6 max-w-md mx-auto">
                    Simpan makanan dan minuman favorit Anda untuk memudahkan pemesanan di masa depan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a 
                        href="{{ route('products') }}" 
                        class="px-6 py-3 bg-[#0C2B4E] dark:bg-blue-600 text-white rounded-lg hover:bg-[#163e6d] dark:hover:bg-blue-700 transition-colors font-medium shadow-lg"
                    >
                        <i class="fas fa-utensils mr-2"></i> Jelajahi Menu
                    </a>
                    <button 
                        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })"
                        class="px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors font-medium"
                    >
                        <i class="fas fa-arrow-up mr-2"></i> Kembali ke Atas
                    </button>
                </div>
            </div>
        @endif
    </div>
</section>