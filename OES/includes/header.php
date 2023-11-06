<header>
        <div id="logo-holder">
            <img src="logo.png" alt="" style="width:50px;height:50px";>
            Andres Bonifacio Integrated School
       </div> 
        <nav>
            <?php 
            if(isset($_SESSION["role"])){
            ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="student.php">Students</a>
            <a href="settings.html">Settings</a>
            <a href="login.php">Logout</a>
            <?php 
            }else{
            ?>
                <a href="login.php">Login</a>
            <?php }
            ?>        
        </nav>
</header>