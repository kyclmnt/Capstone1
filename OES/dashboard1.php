<?php

require "./template/header.php";

load_header("Dashboard", ["dashboard"], ["main"]);

?>
<body>
    <header>
        ABIS
    </header>
    <main>
        <h1>
            DASHBOARD
        </h1>
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
        <!-- <div id="grd11">
            <div class="total">
                <div>
                    <h2>
                        62
                    </h2>
                    <p>
                       Grade 11
                    </p>
                </div>
               
            </div>
            <div class="section">
                <div><p>ABM</p><h2>18</h2></div>
                <div><p>HE</p><h2>15</h2></div>
                <div><p>CSS</p><h2>20</h2></div>
                <div><p>TD</p><h2>9</h2></div>
            </div>
        </div>

        <div id="grd12">
            <div class="total">
                <div>
                    <h2>
                        94
                    </h2>
                    <p>
                       Grade 12
                    </p>
                </div>
               
            </div>
            <div class="section">
                <div><p>ABM</p><h2>18</h2></div>
                <div><p>HE</p><h2>15</h2></div>
                <div><p>CSS</p><h2>20</h2></div>
                <div><p>TD</p><h2>9</h2></div>
            </div>
        </div>   -->
    </main>
</body>
</html>