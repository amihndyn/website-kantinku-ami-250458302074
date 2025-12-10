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
    <main id="main-content" class="pt-16 sm:pt-20 md:pt-24 md:pl-0 lg:pl-64 smooth-transition min-h-screen">
        <div class="p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold dark:text-white">
                    Create New Product
                </h2>
            </div>

            <!-- Form -->
            <div class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-4 sm:p-6 md:p-8">
                <form id="addProductForm" class="space-y-6 sm:space-y-8" wire:submit.prevent="save">
                    <!-- Product Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Product Name</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the name of the product</p>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                id="product-name" 
                                class="w-full px-4 py-3 sm:py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base"
                                placeholder="Enter product name"
                                wire:model="name"
                                required>
                            <div class="absolute right-4 sm:right-6 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-box text-gray-400 text-sm sm:text-base"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Use a descriptive name for your product</p>
                    </div>

                    <!-- Product Slug -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Product Slug</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the URL-friendly slug for the product</p>
                        </label>
                        <div class="relative">
                            <input type="text" 
                                id="product-slug"
                                wire:model="slug" 
                                class="w-full px-4 py-3 sm:py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base"
                                placeholder="Enter product slug"
                                required>
                            <div class="absolute right-4 sm:right-6 top-1/2 transform -translate-y-1/2">
                                <i class="fas fa-link text-gray-400 text-sm sm:text-base"></i>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Slug will be auto-generated if left empty</p>
                    </div>

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Category</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Select the product category</p>
                        </label>
                        <select id="product-category" 
                            wire:model="category"
                            class="w-full px-4 py-3 sm:py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Price</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the product price</p>
                        </label>
                        <div class="relative">
                            <div class="absolute left-4 sm:left-6 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm sm:text-base">
                                Rp
                            </div>
                            <input type="number" 
                                wire:model="price"
                                id="product-price" 
                                class="w-full pl-12 sm:pl-14 pr-4 py-3 sm:py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base"
                                placeholder="Enter product price"
                                min="0"
                                step="1000"
                                required>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Enter price in Indonesian Rupiah</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Description</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Enter the product description</p>
                        </label>
                        <textarea id="product-description" 
                            wire:model="description"
                            rows="3"
                            class="w-full px-4 py-3 sm:py-4 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base"
                            placeholder="Enter product description"></textarea>
                        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">Describe your product in detail</p>
                    </div>

                    <!-- Product Image -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2 sm:mb-3">
                            <span class="text-base sm:text-lg font-semibold">Product Image</span>
                            <p class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 mt-1">Upload product image</p>
                        </label>
                        <div class="file-input-wrapper w-full">
                            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-4 sm:p-6 md:p-8 text-center cursor-pointer">
                                @if (!$fileSelected)
                                    <i class="fas fa-cloud-upload-alt text-2xl sm:text-3xl text-gray-400 mb-2 sm:mb-3"></i>
                                    <p class="text-gray-600 dark:text-gray-400 font-medium mb-1 text-sm sm:text-base">Click to upload or drag and drop</p>
                                    <p class="text-gray-500 dark:text-gray-500 text-xs sm:text-sm">PNG, JPG, GIF up to 5MB</p>
                                @else
                                    <i class="fas fa-check-circle text-2xl sm:text-3xl text-green-500 mb-2 sm:mb-3"></i>
                                    <p class="text-gray-600 dark:text-gray-400 font-medium mb-1 text-sm sm:text-base">File selected:</p>
                                    <p class="text-gray-500 dark:text-gray-500 text-xs sm:text-sm truncate">{{ $image->getClientOriginalName() }}</p>
                                @endif
                                <input type="file" wire:model="image" accept="image/*" class="w-full h-full absolute top-0 left-0 opacity-0 cursor-pointer" />
                            </div>
                        </div>
                        @if ($fileSelected)
                        <div class="mt-4">
                            <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                                <div class="flex items-center">
                                    <i class="fas fa-image text-blue-500 mr-3 text-sm sm:text-base"></i>
                                    <span class="text-gray-700 dark:text-gray-300 text-sm sm:text-base truncate">{{ $image->getClientOriginalName() }}</span>
                                </div>
                                <button 
                                    type="button" 
                                    wire:click="$set('image', null); $set('fileSelected', false);" 
                                    class="text-red-500 hover:text-red-700 text-sm sm:text-base">
                                    Remove
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Form Actions -->
                    <div class="flex flex-col sm:flex-row justify-end gap-3 sm:gap-4 pt-6 sm:pt-8 border-t border-gray-100 dark:border-gray-700">
                        <a href="{{ route('dashboard.products') }}" 
                            class="px-6 sm:px-8 py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition font-medium text-sm sm:text-base text-center">
                            Cancel
                        </a>
                        <button type="submit" 
                            class="px-6 sm:px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg smooth-transition font-medium text-sm sm:text-base">
                            Save Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slugInput = document.getElementById('product-slug');
            if (slugInput) {
                slugInput.addEventListener('change', function () {
                    this.value = this.value.toLowerCase().trim().replace(/\s+/g, '-');
                });
            }
        });
    </script>
</div>