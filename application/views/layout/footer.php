            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ERNC<sup>2</sup> 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah ini jika kamu ingin mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-success" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?> "></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?> "></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js')?> "></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js')?> "></script>
    <script>
        $('.custom-file-input').on('change', function(){
            let fileName = $(this).val().split('\\').pop();
            $(this).next('custom-file-label').addClass("selected").html(fileName);
        })
    </script>
    <!-- Lightbox Javascripts -->
    <script src="<?= base_url('assets/js/lightbox.js')?>"></script>
    
     <script src="<?= base_url('/assets/vendor/chart.js/Chart.min.js')?>"></script>

    <!-- memasukan data layanan lab ke javascript pie chart -->
    <script>
    var layananLabData = <?= json_encode($layanan_lab_by_status); ?>;
    console.log('layananLabData:', layananLabData);
    </script>
     <!-- Script untuk chart -->
      <script src="<?= base_url('assets/js/demo/layanandata.js')?>"></script>

    <!-- memasukan data peminjaman lab ke javascript pie chart -->
    <script>
    var peminjamanData = <?= json_encode($peminjaman_by_status); ?>;
    console.log('peminjamanData:', peminjamanData);
    </script>
    <!-- Script untuk chart -->
    <script src="<?= base_url('assets/js/demo/peminjamandata.js')?>"></script>

    <!-- memasukan data inventaris ke javascript pie chart -->
    <script>
    var inventarisData = <?= json_encode($inventaris_by_ketersediaan); ?>;
    console.log('inventarisData:', inventarisData);
    </script>
    <!-- Script untuk chart -->
    <script src="<?= base_url('assets/js/demo/inventaris.js')?>"></script>

    <!-- Script untuk inisialisasi dataPerBulan -->
    <script>
        var dataPerBulan = <?= json_encode($dataPerBulan); ?>;
        console.log('dataPerBulan: ', dataPerBulan); // Untuk memastikan variabel terisi dengan benar
    </script>

    <!-- Script untuk inisialisasi chart -->
    <script src="<?= base_url('assets/js/demo/chart-bar-demo.js')?>"></script>
    <script>
        // Pastikan untuk memanggil fungsi initializeChart setelah file datakalender.js dimuat
        initializeChart(dataPerBulan);
    </script>

    <!-- script untuk menampilkan nama file gambar ketika edit gambar -->
    <script>
    function updateLabel(input) {
        var fileName = input.files[0].name;
        var label = input.nextElementSibling;
        label.innerHTML = fileName;
    }
    </script>

    <!-- Script untuk mengambil data dan memanggil fungsi inisialisasi -->
<script>
    var pendapatanLayananData = <?php echo json_encode($pendapatan_layanan); ?>;
    console.log('pendapatanLayananData', pendapatanLayananData);
    var pendapatanPeminjamanData = <?php echo json_encode($pendapatan_peminjaman); ?>;
    console.log('pendapatanPeminjamanData', pendapatanPeminjamanData);
</script>

<!-- Menyisipkan file pendapatan.js -->
<script src="<?= base_url('assets/js/demo/pendapatan.js') ?>"></script>      

<!-- Inisialisasi fungsi -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
            initializeChart(pendapatanLayananData, pendapatanPeminjamanData);
        });
</script>
</body>
</html>