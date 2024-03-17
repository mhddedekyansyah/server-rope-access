<!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
               
                <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : ' ' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <li class="nav-item {{ request()->routeIs('produk.*') ? 'active' : ' ' }}">
                <a class="nav-link " href="{{ route('produk.index') }}">
                    <i class="fas fa-cart-plus"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item {{ request()->routeIs('transaksi.*') ? 'active' : ' ' }}">
                <a class="nav-link" href="{{ route('transaksi.index') }}">
                    <i class="fas fa-exchange-alt"></i>
                    <span>Transaksi</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item {{ request()->routeIs('jasa.*') ? 'active' : ' ' }}">
                <a class="nav-link" href="{{ route('jasa.index') }}">
               <i class="fas fa-users-cog"></i>
                    <span>Jasa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
  
            <li class="nav-item {{ request()->routeIs('gallery.index') ? 'active' : ' ' }}">
                <a class="nav-link" href="{{ route('gallery.index') }}">
               <i class="far fa-images"></i>
                    <span>Gallery Jasa</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->