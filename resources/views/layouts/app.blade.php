<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopHub - @yield('title', 'Online Store')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f8f9fa; }
        .navbar { background: linear-gradient(135deg, #1a1a2e, #16213e) !important; }
        .navbar-brand { color: white !important; font-weight: 700; font-size: 1.5rem; }
        .nav-link { color: rgba(255,255,255,0.8) !important; }
        .nav-link:hover { color: #e94560 !important; }
        .btn-primary { background: linear-gradient(135deg, #e94560, #c23152); border: none; }
        .btn-primary:hover { background: linear-gradient(135deg, #c23152, #e94560); border: none; }
        .card { transition: all 0.3s; border: none; box-shadow: 0 2px 15px rgba(0,0,0,0.08); }
        .card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.15); }
        .cart-badge { position: absolute; top: -8px; right: -8px; background: #e94560; font-size: 10px; }
        footer { background: linear-gradient(135deg, #1a1a2e, #16213e); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="fas fa-shopping-bag me-2" style="color:#e94560"></i>ShopHub
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">
                        <i class="fas fa-box me-1"></i>Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-1"></i>Contact
                    </a>
                </li>
                @auth
                    @if(auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}" style="color:#ffd700 !important">
                            <i class="fas fa-tachometer-alt me-1"></i>Admin Panel
                        </a>
                    </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav align-items-center gap-2">
                <!-- Cart -->
                <li class="nav-item position-relative me-2">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart fs-5"></i>
                        @php $cartCount = count(session()->get('cart', [])); @endphp
                        @if($cartCount > 0)
                            <span class="badge rounded-pill cart-badge">{{ $cartCount }}</span>
                        @endif
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm px-3" href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>{{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <span class="dropdown-item text-muted small">
                                    <i class="fas fa-envelope me-2"></i>{{ auth()->user()->email }}
                                </span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    <i class="fas fa-box me-2"></i>My Orders
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('cart.index') }}">
                                    <i class="fas fa-shopping-cart me-2"></i>My Cart
                                </a>
                            </li>
                            @if(auth()->user()->isAdmin())
                            <li>
                                <a class="dropdown-item text-warning" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Admin Panel
                                </a>
                            </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@if(session('success'))
    <div class="alert alert-success alert-dismissible m-0 py-2" role="alert">
        <div class="container"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible m-0 py-2" role="alert">
        <div class="container"><i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@yield('content')

<footer class="text-white py-5 mt-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">
                    <i class="fas fa-shopping-bag me-2" style="color:#e94560"></i>ShopHub
                </h5>
                <p class="text-muted">Sadiqabad, Pakistan ka number 1 online store. Quality products at best prices.</p>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-muted text-decoration-none">
                            <i class="fas fa-chevron-right me-2" style="color:#e94560"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('products.index') }}" class="text-muted text-decoration-none">
                            <i class="fas fa-chevron-right me-2" style="color:#e94560"></i>Products
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('contact') }}" class="text-muted text-decoration-none">
                            <i class="fas fa-chevron-right me-2" style="color:#e94560"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h6 class="fw-bold mb-3">Contact Info</h6>
                <p class="text-muted mb-2">
                    <i class="fas fa-map-marker-alt me-2" style="color:#e94560"></i>Sadiqabad, Punjab, Pakistan
                </p>
                <p class="text-muted mb-2">
                    <i class="fas fa-envelope me-2" style="color:#e94560"></i>aenagul561@gmail.com
                </p>
                <p class="text-muted mb-2">
                    <i class="fas fa-clock me-2" style="color:#e94560"></i>Mon-Sat: 9AM - 9PM
                </p>
            </div>
        </div>
        <hr class="border-secondary mt-4">
        <p class="text-center text-muted mb-0">© {{ date('Y') }} ShopHub. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>