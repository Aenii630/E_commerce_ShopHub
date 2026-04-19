<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #f0f2f5; }
        .sidebar { width: 260px; background: linear-gradient(180deg, #1a1a2e, #16213e); min-height: 100vh; position: fixed; top: 0; left: 0; z-index: 1000; overflow-y: auto; }
        .sidebar .brand { padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 8px; margin: 2px 10px; transition: all 0.3s; display: block; text-decoration: none; }
        .sidebar .nav-link:hover { background: rgba(233,69,96,0.2); color: #e94560; }
        .sidebar .nav-link.active { background: rgba(233,69,96,0.3); color: #e94560; }
        .sidebar .nav-link i { width: 20px; }
        .sidebar .section-title { color: rgba(255,255,255,0.3); font-size: 11px; text-transform: uppercase; padding: 10px 20px; letter-spacing: 1px; }
        .main-content { margin-left: 260px; min-height: 100vh; }
        .topbar { background: white; padding: 15px 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 999; }
        .content-area { padding: 30px; }
        .stat-card { border: none; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
        .card { border: none; box-shadow: 0 2px 15px rgba(0,0,0,0.08); border-radius: 12px; }
        .table th { font-weight: 600; }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <div class="brand">
        <h5 class="text-white fw-bold mb-0">
            <i class="fas fa-shopping-bag me-2" style="color:#e94560"></i>ShopHub
        </h5>
        <small class="text-muted">Admin Panel</small>
    </div>

    <div class="mt-3">
        <p class="section-title">Main Menu</p>
        <a href="{{ route('admin.dashboard') }}"
           class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <p class="section-title mt-2">Management</p>
        <a href="{{ route('admin.products.index') }}"
           class="nav-link {{ request()->routeIs('admin.products*') ? 'active' : '' }}">
            <i class="fas fa-box me-2"></i> Products
        </a>
        <a href="{{ route('admin.orders.index') }}"
           class="nav-link {{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
            <i class="fas fa-shopping-cart me-2"></i> Orders
        </a>
        <a href="{{ route('admin.users.index') }}"
           class="nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            <i class="fas fa-users me-2"></i> Users
        </a>

        <p class="section-title mt-2">Other</p>
        <a href="{{ route('home') }}" class="nav-link">
            <i class="fas fa-store me-2"></i> View Store
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="nav-link border-0 bg-transparent w-100 text-start" style="color:rgba(255,255,255,0.7)">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="topbar">
        <h6 class="mb-0 fw-bold">@yield('title', 'Dashboard')</h6>
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm">
                <i class="fas fa-store me-1"></i>View Store
            </a>
            <div>
                <span class="fw-bold">{{ auth()->user()->name }}</span>
                <span class="badge ms-1" style="background:#e94560">Admin</span>
            </div>
        </div>
    </div>

    <div class="content-area">
        @if(session('success'))
        <div class="alert alert-success alert-dismissible">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @yield('content')
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
@stack('scripts')
</body>
</html>