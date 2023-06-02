<div>
    <!-- Footer START -->
    <footer class="footer">
        <div class="footer-content">
            <p class="m-b-0">Copyright © 2023 Storytales Studios. All rights reserved.</p>
            <span>
                <a href="" class="text-gray m-r-15">Term &amp; Conditions</a>
                <a href="" class="text-gray">Privacy &amp; Policy</a>
            </span>
        </div>
    </footer>
    <!-- Footer END -->

</div>
<!-- Page Container END -->
<script>
    // Fungsi untuk menampilkan preview gambar
    function previewImageKK(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImageKK')
                    .attr('src', e.target.result)
                    .show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Mengaktifkan fungsi preview saat terjadi perubahan pada input file
    $('#imageInputKK').change(function() {
        previewImageKK(this);
    });
</script>

<script>
    // Fungsi untuk menampilkan preview gambar
    function previewImageKIP(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#previewImageKIP')
                    .attr('src', e.target.result)
                    .show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    // Mengaktifkan fungsi preview saat terjadi perubahan pada input file
    $('#imageInputKIP').change(function() {
        previewImageKIP(this);
    });
</script>
<!-- Core Vendors JS -->
<script src="<?= base_url() ?>assets/js/vendors.min.js"></script>

<!-- Page JS -->
<script src="<?= base_url() ?>assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/datatables.js"></script>
<script src="<?= base_url() ?>assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>


<!-- Additional JS -->
<script src="<?= base_url() ?>assets/vendors/select2/select2.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/quill/quill.min.js"></script>
<script src="<?= base_url() ?>assets/js/pages/e-commerce-product-edit.js"></script>

<!-- Core JS -->
<script src="<?= base_url() ?>assets/js/app.min.js"></script>

</body>

</html>