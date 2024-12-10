 <!--   Core JS Files   -->
 <script src="{{ asset('backend/assets/js/core/jquery-3.7.1.min.js') }}"></script>
 <script src="{{ asset('backend/assets/js/core/popper.min.js') }}"></script>
 <script src="{{ asset('backend/assets/js/core/bootstrap.min.js') }}"></script>

 <!-- jQuery Scrollbar -->
 <script src="{{ asset('backend/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

 <!-- jQuery Sparkline -->
 <script src="{{ asset('backend/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

 <!-- Chart Circle -->
 <script src="{{ asset('backend/assets/js/plugin/chart-circle/circles.min.js') }}"></script>

 <!-- Datatables -->
 <script src="{{ asset('backend/assets/js/plugin/datatables/datatables.min.js') }}"></script>

 <!-- Bootstrap Notify -->
 <script src="{{ asset('backend/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

 <!-- jQuery Vector Maps -->
 <script src="{{ asset('backend/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
 <script src="{{ asset('backend/assets/js/plugin/jsvectormap/world.js') }}"></script>

 <!-- Sweet Alert -->
 <script src="{{ asset('backend/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

 <!-- Kaiadmin JS -->
 <script src="{{ asset('backend/assets/js/kaiadmin.min.js') }}"></script>

 <!-- Kaiadmin DEMO methods, don't include it in your project! -->
 <script src="{{ asset('backend/assets/js/setting-demo.js') }}"></script>


 <script>
     const previewImage = function(event, imgId) {
         const file = event.target.files[0];
         const reader = new FileReader();
         reader.onload = function() {
             const imgElement = document.getElementById(imgId);
             imgElement.src = reader.result;
         }
         if (file) {
             reader.readAsDataURL(file);
         }
     }
 </script>

 @stack('scripts')
