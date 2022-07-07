<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Trang chủ</p>
    </a>
    <a href="{{ route('contact') }}" class="nav-link {{ Request::is('contact') ? 'active' : '' }}">
        <i class="fa-solid fa-mobile-screen-button pl-2"></i>
        <p>Thông tin liên hệ</p>
    </a>
    <a href="{{ route('order') }}" class="nav-link {{ Request::is('order') ? 'active' : '' }}">
        <i class="fa-solid fa-file-pen pl-2"></i>
        <p>Đơn hàng</p>
    </a>
    <a href="{{ route('male') }}" class="nav-link {{ Request::is('male') ? 'active' : '' }}">
        <i class="nav-icon fas fa-male"></i>
        <p>Sản phẩm nam</p>
    </a>
    <a href="{{ route('female') }}" class="nav-link {{ Request::is('female') ? 'active' : '' }}">
        <i class="nav-icon fas fa-female"></i>
        <p>Sản phẩm nữ</p>
    </a>
    <a href="{{ route('shoes') }}" class="nav-link {{ Request::is('shoes') ? 'active' : '' }}">
        <i class="fa-solid fa-shoe-prints" style="margin-left: 5px"></i>
        <p>Giầy thể thao</p>
    </a>
</li>