<div>
    <livewire:components.header />
    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" class="pt-16 sm:pt-20 md:pt-24 pl-0 lg:pl-64 smooth-transition min-h-screen">
        <div class="p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold dark:text-white">
                    Categories Management
                </h2>
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 smooth-transition w-full sm:w-auto justify-center text-sm sm:text-base" 
                onclick="openAddCategoryModal()">
                    <i class="fa-solid fa-plus"></i>
                    Add Category
                </button>
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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach ($categories as $category)
                <div class="bg-white dark:bg-gray-800 p-4 sm:p-6 rounded-lg sm:rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 smooth-transition">
                    <div class="flex items-center justify-between mb-3 sm:mb-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-3 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                            {{ $category->products_count }} Products
                        </span>
                    </div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-900 dark:text-white mb-2 line-clamp-1">
                        {{ $category->name }}
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-xs sm:text-sm mb-3 sm:mb-4 line-clamp-1">
                        {{ $category->slug }}
                    </p>
                    <div class="flex space-x-3">
                        <button onclick="if(!confirm('Are you sure you want to delete this category?')) return;" 
                                wire:click="delete({{ $category->id }})" 
                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 text-xs sm:text-sm smooth-transition">
                            Delete
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="add-category-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl shadow-lg w-full max-w-md mx-2 sm:mx-4 p-4 sm:p-6 smooth-transition">
            <div class="flex justify-between items-center mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-semibold dark:text-white">
                    Add Category
                </h3>
                <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 smooth-transition" 
                        onclick="closeModal('add-category-modal')">
                    <i class="fa-solid fa-times text-lg"></i>
                </button>
            </div>
            <form class="space-y-4" wire:submit.prevent="save">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Category Name</label>
                    <input type="text" wire:model="name" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter category name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category Slug
                    </label>
                    <input type="text" wire:model="slug" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           id="category-slug-add"
                           placeholder="Enter category slug">
                </div>
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" class="px-4 sm:px-6 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition text-sm sm:text-base" 
                            onclick="closeModal('add-category-modal')">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 sm:px-6 py-2 sm:py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg smooth-transition text-sm sm:text-base">
                        Save Category
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slugInput = document.getElementById('category-slug-add');
            if (slugInput) {
                slugInput.addEventListener('change', function () {
                    this.value = this.value.toLowerCase().trim().replace(/\s+/g, '-');
                });
            }
            
            // Modal functions
            window.openAddCategoryModal = function() {
                document.getElementById('add-category-modal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            };
            
            window.closeModal = function(modalId) {
                document.getElementById(modalId).classList.add('hidden');
                document.body.style.overflow = '';
            };
            
            // Close modal on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.getElementById('add-category-modal').classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
            
            // Close modal when clicking outside
            document.getElementById('add-category-modal').addEventListener('click', function(e) {
                if (e.target.id === 'add-category-modal') {
                    window.closeModal('add-category-modal');
                }
            });
        });
    </script>
    
    <style>
        .smooth-transition {
            transition: all 0.3s ease;
        }
        
        .line-clamp-1 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
    </style>
</div>