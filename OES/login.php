<?php
require "./template/constants.php";
require './db/conn.php';
require "./template/head.php";


load_header("ABIS | Login", ['login'], []);
?>

<main>
    <div id="one">
        <img src="logo.png">
        <h1>
            ANDRES BONIFACIO INTEGRATED SCHOOL
        </h1>
        <h2>
            <i>"Aim High ABIS, Aim for Excellence"</i>
        </h2>
    </div>
    <div id="two">
        <form action="login.php" method="POST">
            <span>
                LOGIN HERE!
            </span>
            <span id="email">
                <label for=""><i class="fa-regular fa-user" style="color: black;"></i></label>
                <input type="text" name="email" placeholder="Email">
            </span>

            <span id="password">
                <label for=""><i class="fa-solid fa-lock" style="color: black;"></i></label>
                <input type="password" name="password" placeholder="Password">
            </span>
            <button id="submit" name="submit" type="submit">
                LOGIN
            </button>
        </form>
        <a href="home.php" id="btn-fquestion">
            <i class="fa-solid fa-share"></i>
        </a>

    </div>
</main>

<script>
    $("header").addClass("hide");
</script>

<?php
if (isset($_POST["submit"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    if ($conn == false) {
        die(mysqli_connect_error());
    }
    $sql = "SELECT `id`, `lname`, `fname`, `email`, `password`, `role` FROM tb_user_acc WHERE `email` = '$email' and `password` = PASSWORD('$password') LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $result =  mysqli_fetch_assoc($query);
    if (!$result) {
        echo "<script>
            let span=document.createElement('span');
            span.className='error';
            span.innerText='User not Found!';
            document.querySelector('button#submit').after(span);
        </script>";
    } else {
        $_SESSION["email"] = $result["email"];
        $_SESSION["role"] = $result["role"];
        $_SESSION["fname"] = $result["fname"];
        $_SESSION["lname"] = $result["lname"];
        $_SESSION["uid"] = $result["id"];

        mysqli_close($conn);

        if ($_SESSION["role"] == "S") {
            // var_dump($_SESSION); die;
            echo "<script>window.location.href = '".BASE_PATH."abisform.php'</script>";
        } elseif ($_SESSION["role"] == "A") {
            // var_dump($_SESSION);
            echo "<script>window.location.href = '".BASE_PATH."dashboard.php'</script>";
        } else {
            echo "<script>window.location.href = '".BASE_PATH."dashboard.php'</script>";
        }
    }
}
?>
</body>

</html>