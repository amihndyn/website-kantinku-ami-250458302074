<div>
    <livewire:components.header />

    <livewire:components.sidebar />

    <style>
        .smooth-transition {
            transition: all 0.3s ease;
        }
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .file-input-wrapper input[type=file] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>

    <!-- Main Content -->
    <main id="main-content" class="pt-24 pl-64 smooth-transition min-h-screen">
        <div class="p-6">
            <div class="flex flex-col sm:flex-row 
                justify-between items-start sm:items-center 
                gap-4 mb-8">
                <h2 class="text-2xl font-bold dark:text-white">
                    Create New Product
                </h2>
            </div>

            <!-- Form -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-8">
                <form id="addProductForm" class="space-y-8" wire:submit.prevent="update">
                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <span class="text-lg font-semibold">Product Name</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the name of the product</p>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                id="product-name" 
                                class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base"
                                placeholder="Enter product name"
                                wire:model="name"
                                required>
                            <div class="absolute right-6 top-1/2 transform -translate-y-1/4">
                                <i class="fas fa-box text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Use a descriptive name for your product</p>
                    </div>

                    <!-- Product Slug -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <span class="text-lg font-semibold">Product Slug</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the URL-friendly slug for the product</p>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                id="product-slug"
                                wire:model="slug" 
                                class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base"
                                placeholder="Enter product slug"
                                required>
                            <div class="absolute right-6 top-1/2 transform -translate-y-1/4">
                                <i class="fas fa-link text-gray-400"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Slug will be auto-generated if left empty</p>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <span class="text-lg font-semibold">Category</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Select the product category</p>
                        </label>
                        <select id="product-category" 
                            wire:model="category"
                            class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <span class="text-lg font-semibold">Price</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the product price</p>
                        </label>
                        <div class="relative">
                            <div class="absolute left-6 top-1/2 transform -translate-y-1/4 text-gray-500">
                                Rp
                            </div>
                            <input type="number" 
                                wire:model="price"
                                id="product-price" 
                                class="w-full pl-14 pr-4 py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base"
                                placeholder="Enter product price"
                                min="0"
                                step="1000"
                                required>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Enter price in Indonesian Rupiah</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-3">
                            <span class="text-lg font-semibold">Description</span>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the product description</p>
                        </label>
                        <textarea id="product-description" 
                            wire:model="description"
                            rows="4"
                            class="w-full px-4 py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base"
                            placeholder="Enter product description"></textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Describe your product in detail</p>
                    </div>

                    <!-- Image Field -->
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Product Image
                        </label>
                        <input type="file" 
                            id="image"
                            wire:model="image"
                            accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        
                        @if($image)
                            <div class="mt-2">
                                <p class="text-sm text-green-600">New image selected</p>
                                <img src="{{ $image->temporaryUrl() }}" class="mt-2 h-32 w-32 object-cover rounded">
                            </div>
                        @elseif($product->image_path)
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Current image:</p>
                                <img src="{{ asset('storage/' . $product->image_path) }}" 
                                    class="mt-2 h-32 w-32 object-cover rounded">
                            </div>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" 
                                wire:loading.attr="disabled"
                                wire:target="update,image"
                                class="px-8 py-3.5 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white rounded-lg transition font-medium text-base">
                            <span wire:loading.remove wire:target="update">Update Product</span>
                            <span wire:loading wire:target="update">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white inline" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Updating...
                            </span>
                        </button>
                        
                        <!-- Cancel Button -->
                        <a href="{{ route('dashboard.products') }}"
                        class="ml-3 px-8 py-3.5 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg transition font-medium text-base">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.getElementById('product-slug').addEventListener('change', function () {
            this.value = this.value.toLowerCase().trim().replace(/\s+/g, '-');
        });
    </script>
</div>