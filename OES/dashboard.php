<?php
require "./template/head.php";
if (!isset($_SESSION['role'])) {
    header("Location:login.php");
    die;
}

if ($_SESSION['role'] != "A") header("Location:home.php");

load_header("ABIS | Dashboard", ["dashboard", "header"], ["dashboard"]);
?>

<main>
    <section id="charts" class="d-flex gap-5 flex-column align-items-center">
        <div id="bar-chart" class="shadow-sm card p-3 d-flex justify-content-center">
            <canvas id="enrollees-chart"></canvas>
        </div>
        <div id="pie-chart" class="d-flex jusfify-content-center align-items-center gap-3">
            <div class="chart card shadow-sm py-3">
                <canvas id="enrollees-gender-chart"></canvas>
            </div>
            <div class="chart card shadow-sm py-3">
                <canvas id="enrollees-grade-level-chart"></canvas>
            </div>

        </div>

        <div id="total-enrolles" class="d-flex flex-column">
            <p class="time-frame"></p>
            <div class="card shadow-sm rounded-4">
                <h2 id="total-enrollees-container" class="fw-bold overflow-hidden d-flex flex-column">
                    <span id="total-enrollees">00</span>
                </h2>
                <h3>
                    Total of Enrolles
                </h3>
            </div>
        </div>

    </section>
</main>
<?php
require "./template/footer.php";
load_footer([]);
?>