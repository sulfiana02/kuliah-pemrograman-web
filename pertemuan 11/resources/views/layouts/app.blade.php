<!DOCTYPE html>
<html lang="id">
<head>
    @include('layouts.head')
    @stack('styles')
</head>
<body class="bg-slate-50 font-inter">
    
    @include('partials.header')

    
    <main>
        @yield('content')
    </main>

    
    @include('partials.footer')

    
    @include('partials.modals')

    
    <script>
        
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }

        
        const cartIcons = document.querySelectorAll('.cart-icon');
        const cartSidebar = document.getElementById('cart-sidebar');
        const cartOverlay = document.getElementById('cart-overlay');
        const closeCart = document.getElementById('close-cart');
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const cartCounts = document.querySelectorAll('.cart-count');
        const whatsappCheckoutBtn = document.querySelector('.whatsapp-checkout-btn');

        let cart = [];

        
        cartIcons.forEach(icon => {
            icon.addEventListener('click', (e) => {
                e.stopPropagation();
                if (cartSidebar) {
                    cartSidebar.classList.remove('-right-96');
                    cartSidebar.classList.add('right-0');
                }
                if (cartOverlay) {
                    cartOverlay.classList.remove('hidden');
                }
                updateCart();
            });
        });

        
        if (closeCart) {
            closeCart.addEventListener('click', () => {
                cartSidebar.classList.remove('right-0');
                cartSidebar.classList.add('-right-96');
                cartOverlay.classList.add('hidden');
            });
        }

        
        if (cartOverlay) {
            cartOverlay.addEventListener('click', () => {
                cartSidebar.classList.remove('right-0');
                cartSidebar.classList.add('-right-96');
                cartOverlay.classList.add('hidden');
            });
        }

        
        if (whatsappCheckoutBtn) {
            whatsappCheckoutBtn.addEventListener('click', sendOrderToWhatsApp);
        }

        
        function sendOrderToWhatsApp() {
            if (cart.length === 0) {
                showNotification('Keranjang belanja masih kosong', 'error');
                return;
            }

            let message = `🛒 *PESANAN TOKO SEMBAKO ANTI* 🛒\n\n`;
            message += `Halo! Saya ingin memesan produk berikut:\n\n`;
            
            cart.forEach((item, index) => {
                const itemTotal = item.price * item.quantity;
                message += `*${index + 1}. ${item.name}*\n`;
                message += `   💰 Harga Satuan: Rp ${item.price.toLocaleString('id-ID')}\n`;
                message += `   🔢 Jumlah: ${item.quantity} pcs\n`;
                message += `   ➕ Subtotal: Rp ${itemTotal.toLocaleString('id-ID')}\n\n`;
            });

            const totalAmount = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
            message += `═══════════════════\n`;
            message += `💰 *TOTAL: Rp ${totalAmount.toLocaleString('id-ID')}*\n`;
            message += `═══════════════════\n\n`;
            message += `Silakan konfirmasi ketersediaan stock dan total yang harus dibayar. Terima kasih! 😊\n\n`;
            message += `_Pesan ini dikirim via website Toko Sembako Anti_`;

            const phoneNumber = '6282213253954';
            const encodedMessage = encodeURIComponent(message);
            window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
            
            if (cartSidebar) {
                cartSidebar.classList.remove('right-0');
                cartSidebar.classList.add('-right-96');
            }
            if (cartOverlay) {
                cartOverlay.classList.add('hidden');
            }
            
            cart = [];
            updateCart();
        }

        
        function updateCart() {
            if (!cartItems) return;
            
            cartItems.innerHTML = '';
            
            let total = 0;
            let itemCount = 0;
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="text-center py-8 text-slate-500">
                        <i class="fas fa-shopping-cart text-4xl mb-4"></i>
                        <p>Keranjang belanja masih kosong</p>
                    </div>
                `;
                if (cartTotal) cartTotal.classList.add('hidden');
                if (whatsappCheckoutBtn) whatsappCheckoutBtn.classList.add('hidden');
            } else {
                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    total += itemTotal;
                    itemCount += item.quantity;
                    
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item flex items-center mb-4 pb-4 border-b border-slate-200';
                    cartItem.innerHTML = `
                        <div class="cart-item-img w-14 h-14 rounded bg-slate-100 flex items-center justify-center mr-4">
                            <img src="/image/${item.image}" alt="${item.name}" class="cart-item-image">
                        </div>
                        <div class="cart-item-details flex-1">
                            <div class="cart-item-title font-semibold mb-1 text-slate-800">${item.name}</div>
                            <div class="cart-item-price text-blue-500 font-semibold">Rp ${item.price.toLocaleString('id-ID')} x ${item.quantity}</div>
                        </div>
                        <div class="cart-item-actions flex items-center">
                            <div class="decrease-cart-item quantity-btn w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" data-product="${item.name}">-</div>
                            <span class="mx-2 text-slate-700">${item.quantity}</span>
                            <div class="increase-cart-item quantity-btn w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center cursor-pointer mx-1 hover:bg-slate-200 transition" data-product="${item.name}">+</div>
                        </div>
                    `;
                    
                    cartItems.appendChild(cartItem);
                });
                
                if (cartTotal) {
                    cartTotal.classList.remove('hidden');
                    cartTotal.innerHTML = `
                        <span>Total:</span>
                        <span>Rp ${total.toLocaleString('id-ID')}</span>
                    `;
                }
                
                if (whatsappCheckoutBtn) {
                    whatsappCheckoutBtn.classList.remove('hidden');
                }
                
                document.querySelectorAll('.decrease-cart-item').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productName = e.target.getAttribute('data-product');
                        decreaseCartItem(productName);
                    });
                });
                
                document.querySelectorAll('.increase-cart-item').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const productName = e.target.getAttribute('data-product');
                        increaseCartItem(productName);
                    });
                });
            }
            
            cartCounts.forEach(count => {
                count.textContent = itemCount;
            });
        }

        function decreaseCartItem(productName) {
            const item = cart.find(item => item.name === productName);
            if (item) {
                if (item.quantity > 1) {
                    item.quantity--;
                } else {
                    cart = cart.filter(item => item.name !== productName);
                }
                updateCart();
            }
        }

        function increaseCartItem(productName) {
            const item = cart.find(item => item.name === productName);
            if (item) {
                item.quantity++;
                updateCart();
            }
        }

        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'success' ? 'bg-green-500' : 'bg-red-500';
            
            notification.className = `fixed top-4 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }

        
        const productDetail = document.getElementById('product-detail');
        if (productDetail) {
            const closeProductDetail = document.getElementById('close-product-detail');
            const productCards = document.querySelectorAll('.product-card');
            const productName = document.getElementById('product-name');
            const productPrice = document.getElementById('product-price');
            const productDescription = document.getElementById('product-description');
            const productImage = document.getElementById('product-detail-img');
            const productQuantity = document.getElementById('product-quantity');
            const decreaseQuantity = document.getElementById('decrease-quantity');
            const increaseQuantity = document.getElementById('increase-quantity');
            const addToCartBtn = document.getElementById('add-to-cart');
            const whatsappDirectBtn = document.querySelector('.whatsapp-direct-btn');

            let currentProduct = null;
            let quantity = 1;

            productCards.forEach(card => {
                card.addEventListener('click', () => {
                    const product = card.getAttribute('data-product');
                    const price = card.getAttribute('data-price');
                    const category = card.getAttribute('data-category');
                    const image = card.getAttribute('data-image');
                    
                    productName.textContent = product;
                    productPrice.textContent = `Rp ${parseInt(price).toLocaleString('id-ID')}`;
                    productDescription.textContent = `Deskripsi untuk ${product}. Produk berkualitas dengan harga terjangkau.`;
                    
                    productImage.src = `/image/${image}`;
                    productImage.alt = product;
                    
                    quantity = 1;
                    productQuantity.textContent = quantity;
                    
                    currentProduct = {
                        name: product,
                        price: parseInt(price),
                        quantity: quantity,
                        category: category,
                        image: image
                    };
                    
                    productDetail.classList.remove('hidden');
                    setTimeout(() => {
                        productDetail.classList.add('opacity-100');
                        productDetail.querySelector('.product-detail-content').classList.add('translate-y-0');
                    }, 10);
                });
            });

            if (closeProductDetail) {
                closeProductDetail.addEventListener('click', () => {
                    productDetail.querySelector('.product-detail-content').classList.remove('translate-y-0');
                    productDetail.classList.remove('opacity-100');
                    setTimeout(() => {
                        productDetail.classList.add('hidden');
                    }, 300);
                });
            }

            if (decreaseQuantity) {
                decreaseQuantity.addEventListener('click', () => {
                    if (quantity > 1) {
                        quantity--;
                        productQuantity.textContent = quantity;
                        if (currentProduct) {
                            currentProduct.quantity = quantity;
                        }
                    }
                });
            }

            if (increaseQuantity) {
                increaseQuantity.addEventListener('click', () => {
                    quantity++;
                    productQuantity.textContent = quantity;
                    if (currentProduct) {
                        currentProduct.quantity = quantity;
                    }
                });
            }

            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', () => {
                    if (currentProduct) {
                        addToCart(currentProduct);
                        
                        productDetail.querySelector('.product-detail-content').classList.remove('translate-y-0');
                        productDetail.classList.remove('opacity-100');
                        setTimeout(() => {
                            productDetail.classList.add('hidden');
                        }, 300);
                        
                        showNotification(`${currentProduct.name} ditambahkan ke keranjang`);
                    }
                });
            }

            if (whatsappDirectBtn) {
                whatsappDirectBtn.addEventListener('click', function() {
                    if (!currentProduct) return;
                    
                    const message = `🛒 *PESANAN CEPAT TOKO SEMBAKO ANTI* 🛒\n\n` +
                                   `Halo! Saya ingin memesan:\n\n` +
                                   `*${currentProduct.name}*\n` +
                                   `💰 Harga: Rp ${currentProduct.price.toLocaleString('id-ID')}\n` +
                                   `🔢 Jumlah: ${currentProduct.quantity}\n` +
                                   `➕ Subtotal: Rp ${(currentProduct.price * currentProduct.quantity).toLocaleString('id-ID')}\n\n` +
                                   `Silakan konfirmasi ketersediaan stock. Terima kasih! 😊\n\n` +
                                   `_Pesan ini dikirim via website Toko Sembako Anti_`;
                    
                    const phoneNumber = '6282213253954';
                    const encodedMessage = encodeURIComponent(message);
                    window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
                    
                    productDetail.querySelector('.product-detail-content').classList.remove('translate-y-0');
                    productDetail.classList.remove('opacity-100');
                    setTimeout(() => {
                        productDetail.classList.add('hidden');
                    }, 300);
                });
            }
        }

        
        function addToCart(product) {
            const existingProduct = cart.find(item => item.name === product.name);
            
            if (existingProduct) {
                existingProduct.quantity += product.quantity;
            } else {
                cart.push({...product});
            }
            
            updateCart();
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

    @stack('scripts')
</body>
</html>