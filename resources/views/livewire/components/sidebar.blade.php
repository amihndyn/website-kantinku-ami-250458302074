<aside id="sidebar" class="fixed top-0 left-0 h-screen w-64 bg-white dark:bg-gray-800 shadow-sm smooth-transition z-40 overflow-y-auto border-r border-gray-200 dark:border-gray-700">
    <div class="flex flex-col h-full">
        <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex items-center justify-between">
            <h2 class="font-bold text-2xl dark:text-white sidebar-text">KantinKu</h2>
            <button class="hidden lg:block p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 smooth-transition" onclick="toggleSidebarCollapse()">
                <i class="fa-solid fa-chevron-left text-gray-500 dark:text-gray-400 smooth-transition" id="sidebar-collapse-icon"></i>
            </button>
        </div>
        
        <nav class="flex-1 p-4">
            <div class="mb-8 sidebar-section">
                <h3 class="text-xs uppercase text-gray-400 font-semibold tracking-wider mb-4">Menu</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="nav-item flex items-center gap-3 p-3 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-chart-simple"></i>
                            <span class="dark:text-white sidebar-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown">
                            <button class="flex items-center justify-between w-full gap-3 p-3 rounded-lg text-blue-600 {{ Request::routeIs('dashboard.products') || Request::routeIs('dashboard.categories') ? 'dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 smooth-transition' : 'dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition' }}" onclick="toggleDropdown('ecommerce')">
                                <div class="flex items-center gap-3">
                                    <i class="fa-solid fa-store"></i>
                                    <span class="sidebar-text">E-commerce</span>
                                </div>
                                <i class="fa-solid fa-chevron-down text-xs smooth-transition sidebar-text" id="ecommerce-arrow"></i>
                            </button>
                            <div id="ecommerce-dropdown" class="dropdown-content ml-4 mt-2 hidden sidebar-section">
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('dashboard.products') }}" class="nav-item flex items-center gap-3 p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard.products') ? 'active' : '' }}">
                                            <i class="fa-solid fa-box text-xs"></i>
                                            <span class="sidebar-text">Product</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('dashboard.categories') }}" class="nav-item flex items-center gap-3 p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard.categories') ? 'active' : '' }}">
                                            <i class="fa-solid fa-tags text-xs"></i>
                                            <span class="sidebar-text">Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="mb-8 sidebar-section">
                <h3 class="text-xs uppercase text-gray-400 font-semibold tracking-wider mb-4">Account</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard.profile') }}" class="nav-item flex items-center gap-3 p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard.profile') ? 'active' : '' }}">
                            <i class="fa-solid fa-user"></i>
                            <span class="sidebar-text">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.users') }}" class="nav-item flex items-center gap-3 p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard.users') ? 'active' : '' }}">
                            <i class="fa-solid fa-users"></i>
                            <span class="sidebar-text">Users</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="mb-8 sidebar-section">
                <h3 class="text-xs uppercase text-gray-400 font-semibold tracking-wider mb-4">Others</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard.feedbacks') }}" class="nav-item flex items-center gap-3 p-2 rounded-lg text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 smooth-transition {{ Request::routeIs('dashboard.feedbacks') ? 'active' : '' }}">
                            <i class="fa-solid fa-comment"></i>
                            <span class="sidebar-text">Feedbacks</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Overlay -->
    <div id="sidebar-overlay" 
        onclick="window.closeSidebar()"
        class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden smooth-transition">
    </div>

    <script>
    // Sidebar functions di window object
    window.sidebarOpen = false;

    window.toggleSidebar = function() {
        console.log('toggleSidebar called, width:', window.innerWidth);
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        // Di desktop, jangan toggle - biarkan sidebar tetap visible
        if (window.innerWidth >= 1024) {
            console.log('Desktop mode - sidebar always visible');
            return false;
        }
        
        window.sidebarOpen = !window.sidebarOpen;
        
        if (window.sidebarOpen) {
            // Open - hanya di mobile
            if (sidebar) sidebar.classList.remove('-translate-x-full');
            if (overlay) overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            console.log('Mobile: Sidebar opened');
        } else {
            // Close - hanya di mobile
            if (sidebar) sidebar.classList.add('-translate-x-full');
            if (overlay) overlay.classList.add('hidden');
            document.body.style.overflow = '';
            console.log('Mobile: Sidebar closed');
        }
        
        return false;
    }

    window.openSidebar = function() {
        console.log('openSidebar called, width:', window.innerWidth);
        
        // Di desktop, tidak perlu buka (sudah terbuka)
        if (window.innerWidth >= 1024) {
            console.log('Desktop - sidebar already visible');
            return false;
        }
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (sidebar) sidebar.classList.remove('-translate-x-full');
        if (overlay) overlay.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        window.sidebarOpen = true;
        console.log('Mobile: Sidebar opened');
        
        return false;
    }

    window.closeSidebar = function() {
        console.log('closeSidebar called, width:', window.innerWidth);
        
        // Di desktop, tidak perlu tutup
        if (window.innerWidth >= 1024) {
            console.log('Desktop - sidebar should remain visible');
            return false;
        }
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (sidebar) sidebar.classList.add('-translate-x-full');
        if (overlay) overlay.classList.add('hidden');
        document.body.style.overflow = '';
        window.sidebarOpen = false;
        console.log('Mobile: Sidebar closed');
        
        return false;
    }

    // Auto adjust on resize
    window.addEventListener('resize', function() {
        console.log('Resize detected, width:', window.innerWidth);
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        
        if (window.innerWidth >= 1024) {
            // Desktop mode
            if (sidebar) {
                sidebar.classList.remove('-translate-x-full'); // Pastikan visible
                sidebar.classList.add('lg:translate-x-0'); // Force desktop class
            }
            if (overlay) overlay.classList.add('hidden'); // Sembunyikan overlay
            document.body.style.overflow = ''; // Reset scroll
            window.sidebarOpen = false; // Reset state
            console.log('Switched to desktop mode');
        } else {
            // Mobile mode - pastikan sidebar tertutup
            if (sidebar && window.sidebarOpen) {
                sidebar.classList.add('-translate-x-full');
            }
            console.log('Switched to mobile mode');
        }
    });

    // Initialize on load
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Sidebar script loaded, initial width:', window.innerWidth);
        
        const sidebar = document.getElementById('sidebar');
        
        // Pastikan di desktop sidebar visible
        if (window.innerWidth >= 1024 && sidebar) {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('lg:translate-x-0');
            console.log('Desktop init: sidebar visible');
        }
        
        // Debug info
        console.log('Sidebar classes:', sidebar ? sidebar.className : 'No sidebar');
        console.log('Initial sidebarOpen state:', window.sidebarOpen);
    });
    </script>
</aside>