<div class="min-h-screen bg-gradient-to-br from-orange-50 to-amber-100 dark:from-gray-900 dark:to-gray-800 flex items-center justify-center p-4">
  <div class="max-w-6xl w-full grid grid-cols-1 lg:grid-cols-2 bg-white dark:bg-gray-900 rounded-2xl shadow-xl overflow-hidden">
    
    <!-- Bagian Kiri - Ilustrasi -->
    <div class="hidden lg:flex bg-gradient-to-br from-[#8FABD4] to-[#8FABD4] p-8 flex-col justify-center items-center relative overflow-hidden order-1">
      <!-- Background Pattern -->
      <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2"></div>
      </div>
      
      <!-- Content -->
      <div class="relative z-10 text-center text-white max-w-md">
        <!-- Feature List -->
        <div class="space-y-4 text-left">
           <div class="flex justify-center md:justify-end">
            <img 
            src="{{ asset('images/food.png') }}"
            style="
                animation: float3d 5s ease-in-out infinite;
                transition: transform 0.7s ease;"
            onmouseover="this.style.transform='perspective(900px) rotateX(12deg) rotateY(-12deg) scale(1.07)';"
            onmouseout="this.style.transform='';"/>
          </div>
        </div>
      </div>
      <!-- Floating Elements -->
      <div class="absolute top-10 left-10 w-20 h-20 bg-white/10 rounded-full backdrop-blur-sm"></div>
      <div class="absolute bottom-10 right-10 w-24 h-24 bg-white/10 rounded-full backdrop-blur-sm"></div>
    </div>

    <!-- Bagian Kanan - Form Register -->
    <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center order-2">
      <!-- Header dengan Logo -->
      <div class="mb-8 text-center lg:text-left">
        <div class="flex items-center justify-center lg:justify-start space-x-3 mb-4">
          <div class="w-12 h-12 rounded-lg bg-[#8FABD4] flex items-center justify-center">
            <span class="text-[#0C2B4E] font-bold text-3xl">K</span>
          </div>
          <h1 class="text-2xl font-bold text-gray-800 dark:text-white">kantinKu</h1>
        </div>
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">Buat Akun Baru</h2>
        <p class="text-gray-600 dark:text-gray-400">Isi data diri Anda untuk mendaftar</p>
      </div>

      <!-- Flash Messages -->
      @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      @if (session()->has('error'))
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
          {{ session('error') }}
        </div>
      @endif

      <!-- Form Register -->
      <form wire:submit.prevent="register" class="space-y-5">
        <!-- Nama Lengkap -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Lengkap</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <input 
              type="text" 
              wire:model="name"
              class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 @error('name') border-red-500 @enderror" 
              placeholder="Masukkan nama lengkap">
          </div>
          @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
            <input 
              type="email" 
              wire:model="email"
              class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 @error('email') border-red-500 @enderror" 
              placeholder="nama@gmail.com">
          </div>
          @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Role (Admin/Buyer) -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Role</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
              </svg>
            </div>
            <select 
              wire:model="role"
              class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 appearance-none @error('role') border-red-500 @enderror">
              <option value="">Pilih Role</option>
              <option value="admin">Admin</option>
              <option value="buyer">Buyer (Mahasiswa)</option> <!-- DIUBAH -->
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
          @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- NIM (Hanya tampil jika role buyer dipilih) -->
        @if($role === 'buyer') <!-- DIUBAH -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIM</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
              </svg>
            </div>
            <input 
              type="text" 
              wire:model="nim"
              class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 @error('nim') border-red-500 @enderror" 
              placeholder="Masukkan NIM">
          </div>
          @error('nim') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        @endif

        <!-- No Telp -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor Telepon</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone">
                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
              </svg>
            </div>
            <input 
              type="text"
              wire:model="phone_number"
              class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 @error('phone_number') border-red-500 @enderror" 
              placeholder="Masukkan Nomor Telepon">
          </div>
          @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kata Sandi</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input 
              type="password" 
              wire:model="password"
              class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200 @error('password') border-red-500 @enderror" 
              placeholder="Masukkan kata sandi">
          </div>
          @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Konfirmasi Password -->
        <div>
          <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Kata Sandi</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
            </div>
            <input 
              type="password" 
              wire:model="password_confirmation"
              class="block w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg bg-white dark:bg-gray-800 dark:border-gray-700 text-gray-900 dark:text-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#0C2B4E] focus:border-transparent transition duration-200" 
              placeholder="Konfirmasi kata sandi">
          </div>
        </div>

        <!-- Register Button -->
        <div>
          <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-[#8FABD4] hover:bg-[#0C2B4E] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#8FABD4] transition duration-200">
            <span wire:loading.remove>Daftar</span>
            <span wire:loading>Mendaftarkan...</span>
          </button>
        </div>
      </form>

      <!-- Login Link -->
      <div class="mt-8 text-center">
        <p class="text-sm text-gray-600 dark:text-gray-400">
          Sudah punya akun?
          <a href="{{ route('login') }}" wire:navigate class="font-medium text-[#8FABD4] hover:text-[#0C2B4E] transition duration-200">Masuk di sini</a>
        </p>
      </div>
    </div>
  </div>
</div>