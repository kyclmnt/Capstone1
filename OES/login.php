<?php
require "./template/constants.php";

require './db/conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
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
           <div id="tab">
           </div> 
           <form action="login.php" method="POST">
                <span>
                    LOGIN HERE!
                </span>
                <span id="email">
                    <label for=""><i class="fa-regular fa-user" style="color: black;"></i></label>
                    <input type="text" name="email" placeholder="Email">
                </span>

                <span id="password" >
                    <label for=""><i class="fa-solid fa-lock" style="color: black;"></i></label>
                    <input type="password" name="password" placeholder="Password">
                </span>
                <button id="submit" name="submit" type="submit">
                  LOGIN
                </button>
            </form>
            <button id="btn-fquestion">
               <span>
                 ?
               </span> 
            </button>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
<?php
if(isset($_POST["submit"])){
   
    $email = $_POST["email"];
    $password = $_POST["password"];
    if($conn==false){
        die(mysqli_connect_error());
    }
    $sql = "SELECT `email`, `password`, `role` FROM tb_user_acc WHERE `email` = '$email' and `password` = PASSWORD('$password') LIMIT 1";
    $query= mysqli_query($conn,$sql);
    $result =  mysqli_fetch_assoc($query);
    if (!$result){
        echo "<script>
            let span=document.createElement('span');
            span.className='error';
            span.innerText='User not Found!';
            document.querySelector('button#submit').after(span);
        </script>"; 
    }
    else{
        $_SESSION["email"]=$result["email"];
        $_SESSION["role"]=$result["role"];
        mysqli_close($conn); 
    
        if ($_SESSION["role"]=="S"){
            header("Location:./dash/abisform.php");
        }
    
        elseif ($_SESSION["role"]=="A"){
            header("Location:dashboard.php"); #dashboard.php 
        } 
    }
}
?>
</body>
</html>