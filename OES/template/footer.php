<?php
require_once "constants.php";

function load_footer(array $js = [], $show = true)
{ ?>
    <?php if($show) {?>
    <footer class="d-flex justify-center align-items-center" style="height: 5vh !important;">
        
    </footer>
    <?php } ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="./assets/images/DEPED.png" class="rounded me-2" alt="..." height="25" width="25">
                <strong class="me-auto"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <!-- Hello, world! This is a toast message. -->
            </div>
        </div>
    </div>

    <button type="button" id="trigger" class="hide btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal"></button>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">M</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal-body">

                </div>
                <div class="modal-footer" id="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary"></button> -->
                </div>
            </div>
        </div>
    </div>

    </body>

    </html>
    <script>
        function showToast(content) {
            console.log(content);
            var toastLiveExample = $('#liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            $('#liveToast').find('.toast-header > strong').html(content.status)
            $('#liveToast').find('.toast-body').html(content.message);
            toast.show();
        }

        function showModal(title, body, footer_content = [], flag = "g", callback) {
            $("#modal #modal-title").html('');
            $("#modal #modal-body").html('');
            $("#modal #modal-footer").html('');

            $("#trigger").trigger("click");
            $("#modal #modal-title").html(title);
            $("#modal #modal-body").html(body);
            for (let content of footer_content) {
                const first_letter = content[0].toUpperCase();
                content = first_letter + content.slice(1);
                if (content.toLowerCase() == "close" || content.toLowerCase() == "cancel" || content.toLowerCase() == "no") $("#modal #modal-footer").append($(`<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${content}</button>`))
                else {
                    const btn = $(`<button type="button" data-bs-dismiss="modal">${content}</button>`);
                    btn.on("click", callback);
                    btn.addClass(`btn btn-${ flag === "g" ? "success" : "danger"}`);
                    $("#modal #modal-footer").append(btn)
                }
            }
        }

        
    </script>
    <!-- BOOTSTRAP -->
   

    <!-- fontawesome -->
    <script src="<?= base_url("assets/libraries/fontawesome/fontawesome.min.js") ?>"></script>

    <!-- datatable -->
    <script src="<?= base_url("assets/libraries/datatable/datatable.min.js") ?>"></script>

    <?php foreach ($js as $j) { ?>
        <script src="<?= base_url("assets/js/{$j}.js") ?>"> </script>
    <?php } ?>

<?php } ?>  