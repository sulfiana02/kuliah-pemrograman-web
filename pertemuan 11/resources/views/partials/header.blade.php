<header class="bg-gradient-to-br from-slate-50 to-blue-50 shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-md">
                        <i class="fas fa-store text-white text-xl"></i>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-slate-800">Toko Sembako Anti</h1>
                        <p class="text-sm text-slate-600">Kebutuhan harian dengan harga terjangkau</p>
                    </div>
                </a>
            </div>
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('home') }}" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full {{ request()->routeIs('home') ? 'text-blue-600 after:w-full' : '' }}">Beranda</a>
                <a href="{{ route('produk') }}" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full {{ request()->routeIs('produk') ? 'text-blue-600 after:w-full' : '' }}">Produk</a>
                <a href="{{ route('tentang') }}" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full {{ request()->routeIs('tentang') ? 'text-blue-600 after:w-full' : '' }}">Tentang</a>
                <a href="{{ route('kontak') }}" class="text-slate-700 font-medium relative after:content-[''] after:absolute after:w-0 after:h-0.5 after:bg-blue-500 after:-bottom-1 after:left-0 after:transition-all after:duration-300 hover:after:w-full {{ request()->routeIs('kontak') ? 'text-blue-600 after:w-full' : '' }}">Kontak</a>
                <div class="cart-icon ml-4 relative cursor-pointer">
                    <i class="fas fa-shopping-cart text-slate-700 text-xl"></i>
                    <span class="cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">0</span>
                </div>
            </div>
            <div class="md:hidden flex items-center">
                <div class="cart-icon mr-4 relative cursor-pointer">
                    <i class="fas fa-shopping-cart text-slate-700 text-xl"></i>
                    <span class="cart-count absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 text-xs flex items-center justify-center">0</span>
                </div>
                <button id="mobile-menu-button" class="text-slate-700 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white py-4 px-4 shadow-lg">
        <div class="flex flex-col space-y-4">
            <a href="{{ route('home') }}" class="text-slate-700 font-medium {{ request()->routeIs('home') ? 'text-blue-600' : '' }}">Beranda</a>
            <a href="{{ route('produk') }}" class="text-slate-700 font-medium {{ request()->routeIs('produk') ? 'text-blue-600' : '' }}">Produk</a>
            <a href="{{ route('tentang') }}" class="text-slate-700 font-medium {{ request()->routeIs('tentang') ? 'text-blue-600' : '' }}">Tentang</a>
            <a href="{{ route('kontak') }}" class="text-slate-700 font-medium {{ request()->routeIs('kontak') ? 'text-blue-600' : '' }}">Kontak</a>
        </div>
    </div>
</header>