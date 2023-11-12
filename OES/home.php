<?php
require "./template/head.php";

load_header("ABIS | Home", ["header","home", "footer"], [""]);
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
                    <a href="requirements.html" >
                        Requirements
                    </a>
                </span>
                <span>
                    <a href="course.html">
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