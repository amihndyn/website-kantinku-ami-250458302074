<div>
    <livewire:components.header />
    <livewire:components.sidebar />

    <main id="main-content" class="pt-16 sm:pt-20 md:pt-24 md:pl-0 lg:pl-64 smooth-transition min-h-screen">
        <div class="p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold dark:text-white">
                    Products Management
                </h2>
                <a href="{{ route('dashboard.products.create') }}" class="bg-blue-600 hover:bg-blue-700 
                text-white px-4 py-2 rounded-lg flex items-center gap-2 smooth-transition w-full sm:w-auto justify-center text-sm sm:text-base">
                    <i class="fa-solid fa-plus"></i>
                    Add Product
                </a>
            </div>

            @if (session()->has('message'))
            <div id="alert-box" 
                @class([
                    'mb-4 px-4 py-3 rounded-lg text-white text-sm sm:text-base',
                    'bg-red-600' => session('type') === 'error',
                    'bg-green-600' => session('type') !== 'error'
                ])>
                {{ session('message') }}
            </div>
            @endif

            <div class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl 
            shadow-sm border border-gray-100 dark:border-gray-700 
            overflow-hidden smooth-transition">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm 
                                    font-medium text-gray-500 dark:text-gray-300 
                                    uppercase tracking-wider">
                                    Product
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm 
                                    font-medium text-gray-500 dark:text-gray-300 
                                    uppercase tracking-wider">
                                    Category
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm 
                                    font-medium text-gray-500 dark:text-gray-300 
                                    uppercase tracking-wider">
                                    Price
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm 
                                    font-medium text-gray-500 dark:text-gray-300 
                                    uppercase tracking-wider">
                                    Visitor
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-center text-xs sm:text-sm 
                                    font-medium text-gray-500 dark:text-gray-300 
                                    uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($products as $product)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 sm:h-12 sm:w-12 flex-shrink-0 bg-blue-100 rounded-lg overflow-hidden flex items-center justify-center">
                                            <img src="{{ asset('/storage/'.$product->image_path ?? '') }}" 
                                                alt="{{ $product->name }}"
                                                class="h-full w-full object-cover" />
                                        </div>
                                        <div class="ml-3 sm:ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white line-clamp-1">
                                                {{ $product->name }}
                                            </div>
                                            <div class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 line-clamp-1">
                                                {{ $product->slug }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 whitespace-nowrap">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                    {{ 'Rp'.number_format($product->price, 0, ',', '.') }}
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 text-xs sm:text-sm">
                                        {{ $product->visits_count }}
                                    </span>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex flex-wrap gap-2 sm:gap-3 justify-center">
                                        <button wire:click="showProduct({{ $product->id }})" class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 smooth-transition text-xs sm:text-sm">
                                            <i class="fas fa-eye mr-1"></i> <span class="hidden sm:inline">Show</span>
                                        </button>
                                        <a href="{{ route('dashboard.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 smooth-transition text-xs sm:text-sm">
                                            <i class="fas fa-edit mr-1"></i> <span class="hidden sm:inline">Edit</span>
                                        </a>
                                        <button onclick="if(!confirm('Are you sure you want to delete this product?')) return;" wire:click="delete({{ $product->id }})" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 smooth-transition text-xs sm:text-sm">
                                            <i class="fas fa-trash mr-1"></i> <span class="hidden sm:inline">Delete</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    @if ($modalVisible)
    <div id="productDetailModal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        
        <div class="bg-white dark:bg-gray-800 rounded-xl sm:rounded-2xl shadow-2xl w-full max-w-full sm:max-w-lg mx-2 sm:mx-4">

            <!-- Modal Header -->
            <div class="p-4 sm:p-6 border-b border-gray-100 dark:border-gray-700">
                <div class="flex justify-between items-start">
                    <div class="flex items-start space-x-3 sm:space-x-4">
                        <img src="{{ asset('/storage/' . $modalProduct->image_path) }}"
                            class="h-12 w-12 sm:h-14 sm:w-14 rounded-lg sm:rounded-xl object-cover">
                        <div class="max-w-[calc(100%-60px)]">
                            <h3 class="text-lg sm:text-xl font-bold dark:text-white line-clamp-1">
                                {{ $modalProduct->name }}
                            </h3>
                            <p class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm line-clamp-1">
                                {{ $modalProduct->slug }}
                            </p>
                        </div>
                    </div>
                    <button wire:click="closeModal"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2">
                        <i class="fas fa-times text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Modal Body -->
            <div class="p-4 sm:p-6">
                <div class="mb-4 sm:mb-6">
                    <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400 mb-2">Description</h4>
                    <p class="text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-900 rounded-lg sm:rounded-xl p-3 sm:p-4 text-sm sm:text-base">
                        {{ $modalProduct->description }}
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Category</h4>
                        <div class="mt-2 px-3 py-1 rounded-full w-fit bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 flex items-center gap-2 text-sm">
                            <i class="fas fa-tag"></i>
                            <span>{{ $modalProduct->category->name }}</span>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Price</h4>
                        <div class="text-lg sm:text-xl font-bold dark:text-white mt-2">
                            Rp{{ number_format($modalProduct->price, 0, ',', '.') }}
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Likes</h4>
                        <div class="mt-2 px-3 py-1 rounded-full w-fit bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300 flex gap-2 items-center text-sm">
                            <i class="fas fa-heart"></i>
                            {{ $likedCount }}
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Ratings</h4>
                        <div class="mt-2 px-3 py-1 rounded-full w-fit bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 flex gap-2 items-center text-sm">
                            <i class="fas fa-star"></i>
                            {{ number_format($modalProduct->ratings_avg_rating, 1) }}
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Visitors</h4>
                        <div class="mt-2 px-3 py-1 rounded-full w-fit bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 flex gap-2 items-center text-sm">
                            <i class="fas fa-eye"></i>
                            {{ $modalProduct->visits_count }}
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500 dark:text-gray-400">Bookmarks</h4>
                        <div class="mt-2 px-3 py-1 rounded-full w-fit bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300 flex gap-2 items-center text-sm">
                            <i class="fas fa-bookmark"></i>
                            {{ $bookmarkedCount }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-4 sm:p-6 border-t border-gray-100 dark:border-gray-700 flex justify-end">
                <a href="{{ route('dashboard.products.edit', $modalProduct->id) }}" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm sm:text-base">
                    <i class="fas fa-edit mr-1"></i> Edit Product
                </a>
            </div>
        </div>
    </div>
    @endif
</div>