<?php
require "./template/head.php";
unset($_SESSION["role"]);

load_header("Home", ["header","home", "footer"], [""]);
?>

    <main>
        <?php
            if(isset($_SESSION['message'])) {
                echo "<h1>" . $_SESSION['message'] . "</h1>";
                unset($_SESSION['message']);
            }
        ?>
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

<?php
    require "./template/footer.php";
    load_footer([]);
?>