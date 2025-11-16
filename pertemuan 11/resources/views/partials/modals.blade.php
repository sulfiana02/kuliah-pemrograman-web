<div class="product-detail fixed inset-0 bg-white/95 z-50 hidden items-center justify-center opacity-0 transition-opacity duration-300" id="product-detail">
    <div class="product-detail-content bg-white rounded-xl shadow-2xl max-w-4xl w-11/12 max-h-[90vh] overflow-y-auto p-8 relative transform translate-y-5 transition-transform duration-300">
        <div class="close-btn absolute top-4 right-4 bg-slate-100 w-9 h-9 rounded-full flex items-center justify-center cursor-pointer transition-all duration-300 hover:bg-blue-500 hover:text-white" id="close-product-detail">
            <i class="fas fa-times"></i>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex items-center justify-center">
                <div class="h-64 w-64 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-lg flex items-center justify-center" id="product-image">
                    <img src="" alt="" class="product-detail-image" id="product-detail-img">
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-slate-800 mb-4" id="product-name">Product Name</h2>
                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-4 py-1 rounded-full text-lg font-semibold inline-block mb-6" id="product-price">Rp 0</div>
                <p class="text-slate-600 mb-6" id="product-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <div class="flex items-center mb-6">
                    <span class="mr-4 text-slate-700">Jumlah:</span>
                    <div class="flex items-center">
                        <div class="quantity-btn w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" id="decrease-quantity">-</div>
                        <span class="mx-3 text-lg font-semibold" id="product-quantity">1</span>
                        <div class="quantity-btn w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" id="increase-quantity">+</div>
                    </div>
                </div>
                <!-- WhatsApp Direct Button -->
                <button class="whatsapp-direct-btn w-full py-3 text-lg bg-gradient-to-r from-green-500 to-green-600 text-white border-none rounded cursor-pointer mb-3 transition-all duration-300 hover:from-green-600 hover:to-green-700 hover:shadow-lg flex items-center justify-center gap-2">
                    <i class="fab fa-whatsapp"></i>
                    Pesan Langsung via WhatsApp
                </button>
                <button class="add-to-cart-btn w-full py-3 text-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white border-none rounded cursor-pointer mt-2 transition-all duration-300 hover:from-blue-600 hover:to-indigo-700 hover:shadow-lg" id="add-to-cart">Tambah ke Keranjang</button>
            </div>
        </div>
    </div>
</div>

<!-- Cart Sidebar -->
<div class="cart-overlay fixed inset-0 bg-black/50 z-40 hidden" id="cart-overlay"></div>
<div class="cart-sidebar fixed top-0 -right-96 w-80 h-full bg-white shadow-lg z-50 transition-all duration-300 p-5 overflow-y-auto" id="cart-sidebar">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-slate-800">Keranjang Belanja</h2>
        <div class="close-btn w-7 h-7 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer transition-all duration-300 hover:bg-blue-500 hover:text-white" id="close-cart">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <div class="cart-items" id="cart-items">
        <!-- Cart items will be added here dynamically -->
        <div class="text-center py-8 text-slate-500">
            <i class="fas fa-shopping-cart text-4xl mb-4"></i>
            <p>Keranjang belanja masih kosong</p>
        </div>
    </div>
    <div class="cart-total flex justify-between mt-5 pt-5 border-t-2 border-slate-200 font-semibold text-lg text-slate-800 hidden" id="cart-total">
        <span>Total:</span>
        <span>Rp 0</span>
    </div>
    <!-- WhatsApp Checkout Button -->
    <button class="whatsapp-checkout-btn w-full mt-4 py-3 bg-gradient-to-r from-green-500 to-green-600 text-white border-none rounded-lg cursor-pointer transition-all duration-300 hover:from-green-600 hover:to-green-700 hover:shadow-lg font-semibold flex items-center justify-center gap-3 text-lg">
        <i class="fab fa-whatsapp text-xl"></i>
        Pesan via WhatsApp
    </button>
</div>