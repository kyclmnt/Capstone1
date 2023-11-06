<?php 
require "./template/head.php";

load_header("Dashboard", ["dashboard","header"], ["dashboard"]);
?>

<?php 
require "./includes/header.php";
?>
    <main>

        <section id="charts">
            <div id="total-enrolles">
                <div class="card">
                    <h2 id="total-enrollees">
                        156
                    </h2>
                    <h3>
                        Total of Enrolles
                    </h3>
                </div>
            </div>
            
            <div id="pie-chart">
                <div class="chart">
                    <h2>Enrollment By Gender</h2>
                    <canvas id="enrollees-gender-chart"></canvas>
                </div>
                <div class="chart">
                    <h2>Enrollment By Grade Level</h2>
                    <canvas id="enrollees-grade-level-chart"></canvas>
                </div>
                
            </div>
            <div id="bar-chart">
                <p class="time-frame"></p>
                <canvas id="enrollees-chart"></canvas>
            </div>
                
        </section>        
    </main>
<?php 
require "./template/footer.php";
load_footer([]);
?>