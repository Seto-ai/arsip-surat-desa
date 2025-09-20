<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Arsip Surat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { display: flex; }
        .sidebar { width: 250px; height: 100vh; background-color: #f8f9fa; padding: 1rem; position: fixed; }
        .main-content { margin-left: 260px; padding: 1rem; width: 100%; }
        .sidebar .nav-link { color: #333; }
        .sidebar .nav-link.active { font-weight: bold; }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4>Menu</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('arsip.*') ? 'active' : '' }}" href="{{ route('arsip.index') }}">⭐ Arsip</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}" href="{{ route('kategori.index') }}">🗂️ Kategori Surat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('about.index') ? 'active' : '' }}" href="{{ route('about.index') }}">ℹ️ About</a>
            </li>
        </ul>
    </div>

    <div class="main-content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>