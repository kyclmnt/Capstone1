<?php
require_once "constants.php";
function load_footer(array $js = [])
{ ?>
    
    <footer class="flex justify-center">
        ABIS S.Y. 2023-2024
    </footer>

    </body>

    </html>

    <!-- BOOTSTRAP -->
    <script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>

    <!-- fontawesome -->
    <script src="<?= base_url("assets/fontawesome/js/all.min.js") ?>"></script>

    <!-- datatable -->
    <script src="<?= base_url("assets/datatable/js/dataTables.dataTables.min.js") ?>"></script>

    <?php foreach ($js as $j) { ?>
        <script src="<?= base_url("assets/js/{$j}.js") ?>"> </script>
    <?php } ?>

<?php } ?>