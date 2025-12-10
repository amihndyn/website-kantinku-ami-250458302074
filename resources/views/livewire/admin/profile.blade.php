<div>
    <livewire:components.header />
    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" class="pt-16 sm:pt-20 md:pt-24 pl-0 lg:pl-64 smooth-transition min-h-screen">
        <div class="p-4 sm:p-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-xl sm:text-2xl font-bold dark:text-white mb-6 sm:mb-8">
                    Profile Settings
                </h2>

                <!-- Profile Information -->
                <form class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-4 sm:p-6 md:p-8 smooth-transition mb-6 sm:mb-8" 
                      wire:submit.prevent="update">
                    
                    <!-- Profile Header -->
                    <div class="flex flex-col sm:flex-row items-center sm:items-start sm:space-x-6 mb-6 sm:mb-8">
                        <div class="relative mb-4 sm:mb-0">
                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                                <span class="text-blue-600 dark:text-blue-400 font-bold text-xl sm:text-2xl">
                                    {{ $initials }}
                                </span>
                            </div>
                        </div>
                        <div class="text-center sm:text-left">
                            <h3 class="text-lg sm:text-2xl font-semibold text-gray-900 dark:text-white mb-1 sm:mb-2">
                                {{ $user->name }}
                            </h3>
                            <p class="text-sm sm:text-base text-gray-500 dark:text-gray-400">
                                {{ $user->nim }} ({{ ucfirst($user->role) }})
                            </p>
                        </div>
                    </div>

                    <!-- Form Fields -->
                    <div class="space-y-4 sm:space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Name
                            </label>
                            <input type="text" wire:model="name" value="{{ $user->name }}" 
                                   class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Email
                            </label>
                            <input type="email" wire:model="email" value="{{ $user->email }}" 
                                   class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Phone
                            </label>
                            <input type="tel" wire:model="phone_number" value="{{ $user->phone_number }}" 
                                   class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base">
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end mt-6 sm:mt-8">
                        <button class="px-4 sm:px-6 py-2 sm:py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg smooth-transition text-sm sm:text-base w-full sm:w-auto" 
                                type="submit">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <style>
    .smooth-transition {
        transition: all 0.3s ease;
    }
    </style>
</div>