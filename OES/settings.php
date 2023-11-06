<?php 
require "./template/head.php";
load_header("Settings",["main","settings"],[]);
?>
<body>
    <header>
       <div id="logo-holder">
            <img src="logo.png" alt="" style="width:35px;height:35px";>
            ABIS
       </div> 
        <nav>
            <a href="dashboard.php">Dashboard</a>
            <a href="student.php">Students</a>
            <a href="settings.php">Settings</a>
            <a href="login.php">Logout</a>
        </nav>
    </header>
    <main>
        <section>
            <div class="setting">
                <h1>
                    SETTINGS
                </h1>   
                <a class="btn btn-account" href="" role="button"><i class="fa-solid fa-user"></i>Account</a><br>
                <a class="btn btn-account" href="" role="button"><i class="fa fa-lock"></i>Password</a><br>
                <a class="btn btn-account" href="" role="button"><i class="fa fa-users"></i>Manage User</a><br>
            </div>
            <div class="account">
                <p>Account</p>
                <form action="">
                   <span>
                        <label for="fname">First Name</label>
                        <input type="text" placeholder="Firstname" id="fname" name="firstname">
                   </span>
                   <span>
                        <label for="lname">Last Name</label>
                        <input type="text" placeholder="Lastname" id="lname" name="lasttname">
                   </span>
                   <span>
                        <label for="uname">Username</label>
                        <input type="text" placeholder="Username" id="uname" name="username">
                   </span>
                   <span>
                        <input type="submit" value="Save">
                   </span> 
                </form>
            </div>
        </section>
    </main>
<?php
    require "./template/footer.php";
    load_footer([]);
?>