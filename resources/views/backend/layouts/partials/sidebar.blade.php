<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/') }}" class="logo">
                <img src="{{ asset('backend/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand"
                    class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a href="{{ url('/') }}">
                        <i class="fas fa-home"></i>
                        <p>Tổng quan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.settings') }}">
                        <i class="fas fa-cogs"></i>
                        <p>Cấu hình chung</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.banners') }}">
                        <i class="fas fa-image"></i>
                        <p>Cấu Hình Banner</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.videos') }}">
                        <i class="fas fa-video"></i>
                        <p>Cấu Hình Video</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.pricings') }}">
                        <i class="fas fa-file-invoice-dollar"></i>
                        <p>Cấu Hình Bảng Giá</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.services') }}">
                        <i class="fab fa-servicestack"></i>
                        <p>Cấu Hình Dịch Vụ</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.facilities') }}">
                        <i class="fas fa-window-restore"></i>
                        <p>Cấu Hình Tiện Ích</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.introductions') }}">
                        <i class="fas fa-pen-square"></i>
                        <p>Cấu Hình Giới Thiệu</p>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#base">
                        <i class="fas fa-layer-group"></i>
                        <p>Base</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="components/avatars.html">
                                    <span class="sub-item">Avatars</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li> --}}

            </ul>
        </div>
    </div>
</div>
