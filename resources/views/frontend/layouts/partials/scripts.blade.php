<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>

<script>
    const menuToggle = document.getElementById("menu-toggle");
    const offcanvasMenu = document.getElementById("offcanvas-menu");
    const overlay = document.getElementById("overlay");

    menuToggle.addEventListener("click", () => {
        offcanvasMenu.classList.toggle("active");
        overlay.classList.toggle("active");
        menuToggle.classList.toggle("menu-open");
    });

    overlay.addEventListener("click", () => {
        offcanvasMenu.classList.remove("active");
        overlay.classList.remove("active");
        menuToggle.classList.remove("menu-open");
    });
</script>

<script>
    // Lắng nghe sự kiện click trên các liên kết trong menu
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();

            // Lấy phần tử mục tiêu dựa trên ID
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            // Cuộn đến phần tử mục tiêu
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        });
    });
</script>

<script>
    document.getElementById('zalo-trigger').addEventListener('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định
        const dropdown = document.querySelector('.zalo-dropdown');
        dropdown.classList.toggle('show');
    });

    // Đóng dropdown nếu nhấn ra ngoài
    document.addEventListener('click', function(e) {
        const trigger = document.getElementById('zalo-trigger');
        const dropdown = document.querySelector('.zalo-dropdown');
        if (!trigger.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.classList.remove('show');
        }
    });
</script>
