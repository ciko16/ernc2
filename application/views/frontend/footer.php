    <!-- Footer-->
    <footer class="py-3" style="background: linear-gradient(90deg, #9cc545, #7bbd45);">
        <div class="container px-5"><p class="m-0 text-center footer-text">Copyright &copy;ERNC<sup>2</sup> 2024</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="<?php echo base_url('frontend/js/scripts.js'); ?>"></script>
    <!-- SB Forms JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <!-- Lightbox Javascripts -->
    <script src="<?= base_url('frontend/js/lightbox.js')?>"></script>
    <!-- Bootstrap Bundle with Popper -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
<!-- Button Kembali ke Atas -->
<button onclick="topFunction()" id="kembalikeatas" title="Kembali ke Atas">↑</button>
<!-- Lightbox JS -->
<script>
    // Get the button
    let kembali = document.getElementById("kembalikeatas");

    // ketika pengguna scroll hingga 200 px, menampilkan button
    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            kembali.style.display = "block";
        } else {
            kembali.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        // scroll keatas dengan animasi smooth
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    }
    </script>
    <!-- script untuk carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
