<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>
    <li class="menu-item {{ Request::is('account') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle ">
            <i class="menu-icon tf-icons bx bx-user"></i>
            <div data-i18n="Account Settings">Account Settings</div>
        </a>
        <ul class="menu-sub ">
            <li class="menu-item {{ Request::is('account*') ? 'active' : '' }}">
                <a href="account" class="menu-link ">
                    <div data-i18n="Account">Account</div>
                </a>
            </li>
        </ul>
    </li>
    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Transaksi</span>
    </li>
    <li class="menu-item  {{ Request::is('transaksi*') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cart"></i>
            <div data-i18n="Account Settings">Transaksi</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('transaksi*') ? 'active' : '' }}">
                <a href="/transaksi" class="menu-link">
                    <div data-i18n="Without menu">Data Transaksi</div>
                </a>
            </li>
        </ul>
    </li>
    @can('adminlevel')
        <li class="menu-header small text-uppercase ">
            <span class="menu-header-text">User</span>
        </li>
        <li
            class="menu-item  {{ Request::is('users*') ? 'active open' : '' }} {{ Request::is('perusahaan*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div data-i18n="Account Settings">Users</div>
            </a>
            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::is('users*') ? 'active' : '' }} {{ Request::is('perusahaan*') ? 'active' : '' }}">
                    <a href="/users" class="menu-link">
                        <div data-i18n="Without menu">Data User</div>
                    </a>
                </li>
            </ul>
        </li>
    @endcan

    @can('kasiradminlevel')
        {{-- Barang --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Barang</span>
        </li>

        <li class="menu-item {{ Request::is('produk*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Account Settings">Barang</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('produk*') ? 'active' : '' }}">
                    <a href="/produk" class="menu-link">
                        <div data-i18n="Without menu">Data Barang</div>
                    </a>
                </li>
            </ul>
        </li>

        {{-- Tagihan --}}
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Tagihan</span>
        </li>

        <li class="menu-item {{ Request::is('produk*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-package"></i>
                <div data-i18n="Account Settings">Tagihan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('produk*') ? 'active' : '' }}">
                    <a href="/tagihan" class="menu-link">
                        <div data-i18n="Without menu">Data Tagihan</div>
                    </a>
                </li>
            </ul>
        </li>
    @endcan
</ul>
