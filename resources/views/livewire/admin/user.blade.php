<div>
    <livewire:components.header />
    <livewire:components.sidebar />

    <!-- Main Content -->
    <main id="main-content" class="pt-16 sm:pt-20 md:pt-24 pl-0 lg:pl-64 smooth-transition min-h-screen">
        <div class="p-4 sm:p-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 sm:gap-4 mb-6 sm:mb-8">
                <h2 class="text-xl sm:text-2xl font-bold dark:text-white">
                    Users Management
                </h2>

                <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2 smooth-transition w-full sm:w-auto justify-center text-sm sm:text-base" 
                onclick="openAddUserModal()">
                    <i class="fa-solid fa-plus"></i>
                    Add User
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

            <div class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden smooth-transition">
                <div class="overflow-x-auto">
                    <table class="w-full min-w-[600px]">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    User
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Email
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Telp
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Role
                                </th>
                                <th class="px-4 sm:px-6 py-3 sm:py-4 text-left text-xs sm:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                            @foreach ($users as $user)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition">
                                <td class="px-4 sm:px-6 py-3 sm:py-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 sm:h-10 sm:w-10 flex-shrink-0 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-semibold text-xs sm:text-sm">
                                                {{ strtoupper(substr($user->name, 0, 1) . substr(explode(' ', $user->name)[1] ?? '', 0, 1)) }}
                                            </span>
                                        </div>
                                        <div class="ml-3 sm:ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white line-clamp-1">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-xs sm:text-sm text-gray-500 dark:text-gray-400 line-clamp-1">
                                                {{ $user->nim }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    {{ $user->email }}
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                                    {{ $user->phone_number }}
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap text-xs sm:text-sm text-gray-900 dark:text-white">
                                    {{ ucfirst($user->role) }}
                                </td>
                                <td class="px-4 sm:px-6 py-3 sm:py-4 whitespace-nowrap">
                                    <button onclick="if(!confirm('Are you sure you want to delete this user?')) return;" 
                                            wire:click="delete({{ $user->id }})" 
                                            class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 smooth-transition text-xs sm:text-sm">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal -->
    <div id="add-user-modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white dark:bg-gray-800 rounded-lg sm:rounded-xl shadow-lg w-full max-w-md mx-2 sm:mx-4 p-4 sm:p-6 smooth-transition max-h-[90vh] overflow-y-auto">
            <div class="flex justify-between items-center mb-4 sm:mb-6">
                <h3 class="text-lg sm:text-xl font-semibold dark:text-white">
                    Add User
                </h3>
                <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 smooth-transition" 
                        onclick="closeModal('add-user-modal')">
                    <i class="fa-solid fa-times text-lg"></i>
                </button>
            </div>
            <form class="space-y-3 sm:space-y-4" wire:submit.prevent="save">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIM</label>
                    <input type="text" wire:model="nim" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter nim">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                    <input type="text" wire:model="name" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter name">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                    <input type="email" wire:model="email" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter email">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password</label>
                    <input type="password" wire:model="password" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter password">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Phone Number</label>
                    <input type="number" wire:model="phone_number" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base" 
                           placeholder="Enter phone number">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Role
                    </label>
                    <select wire:model="role" class="w-full px-4 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white smooth-transition focus:ring-2 focus:ring-blue-500 focus:border-transparent text-sm sm:text-base">
                        <option value="admin">Admin</option>
                        <option value="buyer">Buyer/Mahasiswa</option>
                    </select>
                </div>
                <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4">
                    <button type="button" class="px-4 sm:px-6 py-2 sm:py-3 border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition text-sm sm:text-base" 
                            onclick="closeModal('add-user-modal')">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 sm:px-6 py-2 sm:py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg smooth-transition text-sm sm:text-base">
                        Save User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal functions
            window.openAddUserModal = function() {
                document.getElementById('add-user-modal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            };
            
            window.closeModal = function(modalId) {
                document.getElementById(modalId).classList.add('hidden');
                document.body.style.overflow = '';
            };
            
            // Close modal on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    document.getElementById('add-user-modal').classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
            
            // Close modal when clicking outside
            document.getElementById('add-user-modal').addEventListener('click', function(e) {
                if (e.target.id === 'add-user-modal') {
                    window.closeModal('add-user-modal');
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