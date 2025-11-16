@extends('layouts.app')

@section('title', 'Produk - Toko Sembako Anti')

@section('content')
    <section class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Katalog Produk Kami</h1>
                <p class="text-xl mb-8">Temukan berbagai macam produk kebutuhan sehari-hari dengan kualitas terbaik dan harga terjangkau</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#shampo" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Shampo</a>
                    <a href="#sabun" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Sabun</a>
                    <a href="#bumbu" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Bumbu</a>
                    <a href="#kopi" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Kopi</a>
                    <a href="#mie" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Mie Instan</a>
                    <a href="#minuman" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Minuman</a>
                    <a href="#pencuci-piring" class="bg-white/20 backdrop-blur-sm text-white px-6 py-2 rounded-full font-medium hover:bg-white/30 transition">Pencuci Piring</a>  
                </div>
            </div>
        </div>
    </section>

    <section class="bg-slate-50 py-20">
        <div class="container mx-auto px-4">
            <div class="mb-16" id="shampo">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Shampo</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Rejoice', 'price' => 10000, 'image' => 'rejoice.jpeg'],
                        ['name' => 'Sunsilk', 'price' => 10000, 'image' => 'sunsilk.jpeg'],
                        ['name' => 'Head & Shoulders', 'price' => 10000, 'image' => 'head shoulders.jpeg'],
                        ['name' => 'Lifebuoy', 'price' => 5000, 'image' => 'lifebuoy.jpeg'],
                        ['name' => 'Zinc', 'price' => 8000, 'image' => 'zinc.jpeg'],
                        ['name' => 'Pantene', 'price' => 12000, 'image' => 'pantene.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="shampo" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            
            <div class="mb-16" id="sabun">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Sabun Mandi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Nuvo', 'price' => 4000, 'image' => 'nuvo.jpeg'],
                        ['name' => 'Shinzui', 'price' => 5000, 'image' => 'shinzui.jpeg'],
                        ['name' => 'Giv', 'price' => 5000, 'image' => 'giv.jpeg'],
                        ['name' => 'Lervia', 'price' => 5000, 'image' => 'lervia.jpeg'],
                        ['name' => 'Lifebuoy Sabun', 'price' => 4500, 'image' => 'sabun lifebuoy.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="sabun" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-16">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Sabun Cuci Pakaian</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Daia', 'price' => 12000, 'image' => 'daia.jpeg'],
                        ['name' => 'Boom', 'price' => 11000, 'image' => 'boom.jpeg'],
                        ['name' => 'Sayang', 'price' => 10000, 'image' => 'sayang.jpeg'],
                        ['name' => 'Gentle Gen', 'price' => 13000, 'image' => 'gentle gen.jpeg'],
                        ['name' => 'Rinso', 'price' => 15000, 'image' => 'rinso.jpeg'],
                        ['name' => 'Downy', 'price' => 18000, 'image' => 'downy.jpeg'],
                        ['name' => 'Molto', 'price' => 16000, 'image' => 'molto.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="sabun-cuci" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-16" id="bumbu">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Bumbu Dapur</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Ladaku', 'price' => 11000, 'image' => 'ladaku.jpeg'],
                        ['name' => 'Garam', 'price' => 5000, 'image' => 'garam.jpeg'],
                        ['name' => 'Miwon', 'price' => 5000, 'image' => 'miwon.jpeg'],
                        ['name' => 'Kecap ABC', 'price' => 7000, 'image' => 'kecap abc.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="bumbu" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-16" id="kopi">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Kopi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Kopi Uang Emas', 'price' => 15000, 'image' => 'uang emas.jpeg'],
                        ['name' => 'Kopi Gula Aren', 'price' => 18000, 'image' => 'gula aren.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="kopi" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-amber-50 to-yellow-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-16" id="mie">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Mie Instan</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Sedap Goreng', 'price' => 3000, 'image' => 'sedap-goreng.jpeg'],
                        ['name' => 'Indomie', 'price' => 3000, 'image' => 'indomie.jpeg'],
                        ['name' => 'Sedap Kari', 'price' => 3000, 'image' => 'sedap kari.jpeg'],
                        ['name' => 'Sedap Soto', 'price' => 3000, 'image' => 'sedap soto.jpeg'],
                        ['name' => 'Mie Eko', 'price' => 2500, 'image' => 'mie eko.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="mie" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-16" id="minuman">
                <h3 class="text-2xl font-bold text-slate-800 text-center mb-8 relative after:content-[''] after:absolute after:w-1/2 after:h-1 after:bg-gradient-to-r after:from-blue-500 after:to-indigo-600 after:-bottom-2 after:left-1/4 after:rounded">Minuman</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach([
                        ['name' => 'Golda', 'price' => 5000, 'image' => 'golda.jpeg'],
                        ['name' => 'Mizone', 'price' => 7000, 'image' => 'mizone.jpeg'],
                        ['name' => 'Teh Pucuk', 'price' => 5000, 'image' => 'teh pucuk.jpeg'],
                        ['name' => 'Floridina', 'price' => 6000, 'image' => 'floridina.jpeg'],
                        ['name' => 'Milku', 'price' => 8000, 'image' => 'milku.jpeg'],
                        ['name' => 'Sprait', 'price' => 7000, 'image' => 'sprite.jpeg'],
                        ['name' => 'Fanta', 'price' => 7000, 'image' => 'fanta.jpeg'],
                        ['name' => 'Kopikap', 'price' => 3000, 'image' => 'kopikap.jpeg']
                    ] as $product)
                    <div class="product-card bg-white rounded-xl shadow-sm p-6 border border-slate-100 cursor-pointer transition-all duration-300 hover:-translate-y-2 hover:shadow-xl" 
                         data-product="{{ $product['name'] }}" 
                         data-price="{{ $product['price'] }}" 
                         data-category="minuman" 
                         data-image="{{ $product['image'] }}">
                        <div class="h-32 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg mb-4 flex items-center justify-center">
                            <img src="{{ asset('image/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-image">
                        </div>
                        <h4 class="font-semibold text-lg text-slate-800">{{ $product['name'] }}</h4>
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-sm font-semibold inline-block mt-2">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection