<div class="container d-flex align-items-center justify-content-between py-2">
    <img src="{{ showImage($settings->logo) }}" class="img-fluid rounded" alt="Logo" style="height: 60px" />
    <a target="_bank" href="tel:{{ str_replace(' ', '', $settings->hotline[0]) }}">
        <button class="btn-dat-phong d-md-none">ĐẶT PHÒNG</button>
    </a>
    <button class="btn d-md-none" id="menu-toggle">
        <i class="fas fa-bars fa-lg"></i>
        <i class="fas fa-times fa-lg"></i>
    </button>

    <nav class="d-none d-md-flex gap-4">
        <a href="#trangchu" class="text-decoration-none text-dark">TRANG CHỦ</a>
        <a href="#gioithieu" class="text-decoration-none text-dark">GIỚI THIỆU</a>
        <a href="#dichvu" class="text-decoration-none text-dark">DỊCH VỤ</a>
        <a href="#cosovatchat" class="text-decoration-none text-dark">CƠ SỞ VẬT CHẤT</a>
        <a href="#banggia" class="text-decoration-none text-dark">BẢNG GIÁ</a>
        <a href="#lienhe" class="text-decoration-none text-dark">LIÊN HỆ</a>
    </nav>

    <a target="_bank" href="tel:{{ str_replace(' ', '', $settings->hotline[0]) }}">
        <button class="btn-dat-phong d-none d-lg-block">ĐẶT PHÒNG</button>
    </a>
</div>
