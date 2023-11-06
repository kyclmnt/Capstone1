<?php 
require "./template/constants.php";
require './db/conn.php';

if(isset($_POST["submit"])){
    $lname = $_POST["lname"];
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($conn==false){
        die(mysqli_connect_error());
    }
    $sql = "INSERT INTO tb_user_acc (`lname`, `fname`, `email`, `password`, `role`) VALUES ('$lname', '$fname', '$email', PASSWORD('$password'), 'S')";
    if (mysqli_query($conn,$sql)) {
        header("Location:home.php");
        $_SESSION['message'] = "SUCCESSFULLY REGISTERED!!";
        mysqli_close($conn);

        die;
    }
}
// $conn = mysqli_connect('localhost', 'root', '', 'db_abis');

require "./template/head.php";
load_header("RegiForm",["main","form", "home" ,"footer"],["settings"]);
?>
    <?php include "./includes/header.php"; ?>
    <main>
        <form action="form.php" method="post">
            <h3>
                Registration Form
            </h3>
            <span id="lname">
                <label for="lname" required><i class="fa-regular fa-user" style="color: black;"></i></label>
                <input type="text" name="lname" placeholder="Enter your Last name">
            </span>
            <span id="fname">
                <label for="fname" required><i class="fa-regular fa-user" style="color: black;"></i></label>
                <input type="text" name="fname" placeholder="Enter your First name">
            </span>
            <span id="email">
                <label for="email" required><i class="fa-regular fa-user" style="color: black;"></i></label>
                <input type="text" name="email" placeholder="Enter your email address">
            </span>
            <span id="password">
                <label for="password" required><i class="fa-solid fa-lock" style="color: black;"></i></label>
                <input type="password" name="password" placeholder="Enter your password">
            </span>
            <!-- <span id="c-password">
                <label for=""><i class="fa-solid fa-check-double" style="color: black;"></i></label>
                <input type="password" placeholder="Confirm your password">
            </span> -->
            <button id="reg" type="submit" name="submit" value = "submit">
                Register
            </button>
            <!-- <button id="login">
                Login
            </button> -->
        </form>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<?php
    require "./template/footer.php";
    load_footer([]);
?>
