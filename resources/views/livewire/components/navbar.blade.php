<nav class="sticky top-0 bg-[#0C2B4E] dark:bg-gray-900 dark:border-b dark:border-gray-800 shadow z-50 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <a href="/" class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-[#8FABD4] dark:bg-blue-600 flex items-center justify-center transition-colors duration-300">
                    <span class="text-white font-bold text-lg">K</span>
                </div>
                <span class="font-bold text-xl text-[#8FABD4] dark:text-blue-400 hidden sm:inline transition-colors duration-300">KantinKu</span>
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="/#home" class="text-white dark:text-gray-300 hover:text-[#8FABD4] dark:hover:text-blue-400 transition-colors font-medium">Home</a>
                <a href="/#about" class="text-white dark:text-gray-300 hover:text-[#8FABD4] dark:hover:text-blue-400 transition-colors font-medium">About</a>
                <a href="/#menu" class="text-white dark:text-gray-300 hover:text-[#8FABD4] dark:hover:text-blue-400 transition-colors font-medium">Menu</a>
                <a href="/#feedback" class="text-white dark:text-gray-300 hover:text-[#8FABD4] dark:hover:text-blue-400 transition-colors font-medium">Feedback</a>
                @auth
                <a href="{{ route('bookmarks') }}" class="text-white dark:text-gray-300 hover:text-[#8FABD4] dark:hover:text-blue-400 transition-colors font-medium">Bookmarks</a>
                @endauth

                <livewire:theme-toggle />
            </div>

            @guest
            <div class="hidden md:flex items-center gap-4">
                <a href="{{ route('login') }}" wire:navigate class="px-6 py-2 bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300">
                    Sign In
                </a>
                <a href="{{ route('register') }}" wire:navigate class="px-6 py-2 bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300">
                    Sign Up
                </a>
            </div>
            @endguest
            
            @auth
            <div class="hidden md:flex items-center gap-4">
                @if(auth()->user()->role === 'admin')
                <!-- Button Dashboard untuk Admin -->
                <a href="{{ route('dashboard') }}" class="px-6 py-2 bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300">
                    Dashboard
                </a>
                @endif
                
                <!-- Button Logout untuk semua user -->
                <form method="POST" action="/logout">
                    @csrf
                    <button type="button" onclick="this.closest('form').submit()" class="px-6 py-2 bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300 cursor-pointer">
                        Logout
                    </button>
                </form>
            </div>
            @endauth

            <!-- Hamburger Button dengan styling yang lebih jelas -->
            <button id="menu-btn" type="button" 
                    class="md:hidden p-2 rounded-md hover:bg-[#1E3A5F] dark:hover:bg-gray-800 transition-colors duration-300 border border-white/30" 
                    aria-label="Toggle menu"
                    style="min-width: 44px; min-height: 44px; display: flex; align-items: center; justify-content: center;">
                <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon-open" class="w-6 h-6 text-white dark:text-gray-300" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" id="menu-icon-close" class="w-6 h-6 text-white dark:text-gray-300 hidden"
                    fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu dengan animasi CSS inline -->
        <div id="mobile-menu" class="hidden md:hidden pb-4 space-y-2 bg-white dark:bg-gray-900 rounded-lg mt-2 shadow-lg" 
             style="transition: all 0.3s ease-in-out; transform: translateY(-10px); opacity: 0; max-height: 0; overflow: hidden;">
            <a href="/#home" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors font-medium" style="min-height: 44px; display: flex; align-items: center;">Home</a>
            <a href="/#about" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors font-medium" style="min-height: 44px; display: flex; align-items: center;">About</a>
            <a href="/#menu" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors font-medium" style="min-height: 44px; display: flex; align-items: center;">Menu</a>
            <a href="/#feedback" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors font-medium" style="min-height: 44px; display: flex; align-items: center;">Feedback</a>
            @auth
            <a href="{{ route('bookmarks') }}" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg transition-colors font-medium" style="min-height: 44px; display: flex; align-items: center;">Bookmarks</a>
            @endauth
            <livewire:theme-toggle />
            <div class="pt-2 border-t border-gray-200 dark:border-gray-700">
                @guest
                <a href="{{ route('login') }}" class="block px-4 py-3 text-center bg-[#0C2B4E] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300" style="min-height: 44px; display: flex; align-items: center; justify-content: center;">
                    Sign In
                </a>
                <a href="{{ route('register') }}" wire:navigate class="block mt-2 px-4 py-3 text-center bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300" style="min-height: 44px; display: flex; align-items: center; justify-content: center;">
                    Sign Up
                </a>
                @endguest
                @auth
                <!-- Dashboard untuk Admin di Mobile -->
                @if(auth()->user()->role === 'admin')
                <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-center hover:bg-[#7a9bc7] dark:hover:bg-blue-700 text-white rounded-lg font-semibold bg-[#8FABD4] dark:bg-blue-600 transition-colors duration-300 mb-2" style="min-height: 44px; display: flex; align-items: center; justify-content: center;">
                    Dashboard
                </a>
                @endif
                
                <!-- Logout untuk semua user -->
                <form method="POST" action="/logout">
                    @csrf
                    <button type="button" onclick="this.closest('form').submit()" class="w-full px-4 py-3 text-center bg-[#8FABD4] dark:bg-blue-600 text-white rounded-lg font-semibold hover:bg-[#7a9bc7] dark:hover:bg-blue-700 transition-colors duration-300 cursor-pointer" style="min-height: 44px; display: flex; align-items: center; justify-content: center;">
                        Logout
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded - initializing mobile menu');
        
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIconOpen = document.getElementById('menu-icon-open');
        const menuIconClose = document.getElementById('menu-icon-close');
        
        // Debug info
        console.log('Menu button found:', !!menuBtn);
        console.log('Mobile menu found:', !!mobileMenu);
        console.log('Menu icon open found:', !!menuIconOpen);
        console.log('Menu icon close found:', !!menuIconClose);
        
        if (menuBtn && mobileMenu && menuIconOpen && menuIconClose) {
            console.log('All menu elements found, setting up event listeners');
            
            let isMenuOpen = false;
            
            function toggleMenu() {
                isMenuOpen = !isMenuOpen;
                console.log('Toggle menu called, isMenuOpen:', isMenuOpen);
                
                if (isMenuOpen) {
                    // Open menu with animation
                    mobileMenu.classList.remove('hidden');
                    menuIconOpen.classList.add('hidden');
                    menuIconClose.classList.remove('hidden');
                    
                    // Force reflow for animation
                    mobileMenu.offsetHeight;
                    
                    // Animate in
                    setTimeout(() => {
                        mobileMenu.style.transform = 'translateY(0)';
                        mobileMenu.style.opacity = '1';
                        mobileMenu.style.maxHeight = '500px';
                    }, 10);
                    
                    // Add backdrop
                    addBackdrop();
                    
                } else {
                    // Animate out
                    mobileMenu.style.transform = 'translateY(-10px)';
                    mobileMenu.style.opacity = '0';
                    mobileMenu.style.maxHeight = '0';
                    
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                        menuIconOpen.classList.remove('hidden');
                        menuIconClose.classList.add('hidden');
                    }, 300);
                    
                    // Remove backdrop
                    removeBackdrop();
                }
            }
            
            function addBackdrop() {
                if (!document.getElementById('mobile-menu-backdrop')) {
                    console.log('Adding backdrop');
                    const backdrop = document.createElement('div');
                    backdrop.id = 'mobile-menu-backdrop';
                    backdrop.style.cssText = `
                        position: fixed;
                        top: 0;
                        left: 0;
                        right: 0;
                        bottom: 0;
                        background-color: rgba(0, 0, 0, 0.5);
                        z-index: 40;
                        display: block;
                    `;
                    
                    document.body.appendChild(backdrop);
                    
                    // Close menu when backdrop is clicked
                    backdrop.addEventListener('click', function() {
                        console.log('Backdrop clicked, closing menu');
                        toggleMenu();
                    });
                    
                    // Prevent body scroll when menu is open
                    document.body.style.overflow = 'hidden';
                }
            }
            
            function removeBackdrop() {
                const backdrop = document.getElementById('mobile-menu-backdrop');
                if (backdrop) {
                    console.log('Removing backdrop');
                    if (backdrop.parentNode) {
                        backdrop.parentNode.removeChild(backdrop);
                    }
                }
                // Restore body scroll
                document.body.style.overflow = '';
            }
            
            function closeMenu() {
                if (isMenuOpen) {
                    console.log('Closing menu');
                    toggleMenu();
                }
            }
            
            // Event Listeners
            menuBtn.addEventListener('click', function(e) {
                console.log('Menu button clicked');
                e.stopPropagation();
                e.preventDefault();
                toggleMenu();
            });
            
            // Close menu when clicking outside (except backdrop)
            document.addEventListener('click', function(event) {
                if (isMenuOpen && 
                    !mobileMenu.contains(event.target) && 
                    !menuBtn.contains(event.target)) {
                    console.log('Clicked outside, closing menu');
                    closeMenu();
                }
            });
            
            // Close menu on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && isMenuOpen) {
                    console.log('Escape pressed, closing menu');
                    closeMenu();
                }
            });
            
            // Close menu on resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768 && isMenuOpen) {
                    console.log('Resized to desktop, closing menu');
                    closeMenu();
                }
            });
            
            // Close menu when clicking links in mobile menu
            mobileMenu.addEventListener('click', function(e) {
                if (e.target.tagName === 'A' || e.target.tagName === 'BUTTON') {
                    // Don't close immediately for logout button
                    if (!e.target.closest('form')) {
                        console.log('Link clicked in mobile menu, closing in 300ms');
                        setTimeout(closeMenu, 300);
                    }
                }
            });
            
            console.log('Mobile menu initialized successfully');
            
        } else {
            console.error('Some menu elements not found!');
            console.log('menuBtn:', menuBtn);
            console.log('mobileMenu:', mobileMenu);
            console.log('menuIconOpen:', menuIconOpen);
            console.log('menuIconClose:', menuIconClose);
            
            // Make hamburger button visible for debugging
            if (menuBtn) {
                menuBtn.style.backgroundColor = '#FF0000';
                menuBtn.style.border = '2px solid #FFFF00';
            }
        }
    });
    
    // Handle Livewire navigation
    document.addEventListener('livewire:navigated', function() {
        console.log('Livewire navigated, reinitializing menu if needed');
        // Menu should still work after navigation
    });
    </script>
    
    <style>
    /* Ensure hamburger is visible on mobile */
    @media (max-width: 767px) {
        #menu-btn {
            display: flex !important;
            visibility: visible !important;
            opacity: 1 !important;
        }
    }
    
    /* Prevent body scroll when menu is open */
    body.menu-open {
        overflow: hidden;
    }
    </style>
</nav>