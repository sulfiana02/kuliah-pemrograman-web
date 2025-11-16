<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Toko Sembako Anti')</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    'inter': ['Inter', 'sans-serif'],
                },
                colors: {
                    'primary': {
                        50: '#eff6ff',
                        100: '#dbeafe',
                        200: '#bfdbfe',
                        300: '#93c5fd',
                        400: '#60a5fa',
                        500: '#3b82f6',
                        600: '#2563eb',
                        700: '#1d4ed8',
                        800: '#1e40af',
                        900: '#1e3a8a',
                    },
                    'accent': {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        200: '#bae6fd',
                        300: '#7dd3fc',
                        400: '#38bdf8',
                        500: '#0ea5e9',
                        600: '#0284c7',
                        700: '#0369a1',
                        800: '#075985',
                        900: '#0c4a6e',
                    }
                },
                animation: {
                    'fade-in': 'fadeIn 0.3s ease-in-out',
                    'slide-up': 'slideUp 0.3s ease-out',
                    'slide-in-right': 'slideInRight 0.3s ease-out',
                    'bounce-in': 'bounceIn 0.5s ease-out',
                },
                keyframes: {
                    fadeIn: {
                        '0%': { opacity: '0' },
                        '100%': { opacity: '1' },
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(20px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' },
                    },
                    slideInRight: {
                        '0%': { transform: 'translateX(100%)' },
                        '100%': { transform: 'translateX(0)' },
                    },
                    bounceIn: {
                        '0%': { transform: 'scale(0.3)', opacity: '0' },
                        '50%': { transform: 'scale(1.05)' },
                        '70%': { transform: 'scale(0.9)' },
                        '100%': { transform: 'scale(1)', opacity: '1' },
                    }
                }
            }
        }
    }
</script>
<style>
    body {
        font-family: 'Inter', sans-serif;
    }
    .cart-icon {
        z-index: 60;
        position: relative;
    }
    @media (max-width: 768px) {
        .cart-icon {
            padding: 8px;
            margin-right: 8px;
        }
    }
    .hero-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .product-image {
        width: 100%;
        height: 128px;
        object-fit: contain;
        border-radius: 0.5rem;
    }
    .product-detail-image {
        width: 100%;
        height: 256px;
        object-fit: contain;
        border-radius: 0.5rem;
    }
    .cart-item-image {
        width: 56px;
        height: 56px;
        object-fit: contain;
        border-radius: 0.375rem;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .timeline {
        position: relative;
    }
    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 2px;
        height: 100%;
        background: linear-gradient(to bottom, #3b82f6, #8b5cf6);
    }
    @media (max-width: 768px) {
        .timeline::before {
            left: 20px;
        }
    }
</style>