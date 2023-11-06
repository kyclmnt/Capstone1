<?php
require "./template/head.php";
unset($_SESSION["role"]);
load_header("Home", ["header","home"], [""]);
?>

<body>
    <?php include "./includes/header.php"; ?>
    <main>
        <h1><?php
            if(isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
        ?></h1>
        <form action="">

            <h3>
                Online Enrollment System
            </h3>
            <div id="btn">
                <span>
                    <a href="" >
                        Requirements
                    </a>
                </span>
                <span>
                    <a href="course.php">
                        Strand Offerings
                    </a>
                </span>
                <span>
                    <a href="form.php">
                        Register
                    </a> 
                </span>
            </div>
            
        </form>
    </main>

</body>
</html>