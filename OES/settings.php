<?php 
require "./template/head.php";
load_header("Settings",["main","settings", "footer"],["settings"]);

?>  
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
                <form action="" method="post" id="form-container">
                    <input type="hidden" name="id" value="<?= $_SESSION['uid']; ?>">
                    <span>
                            <label for="fname">First Name</label>
                            <input type="text" placeholder="Firstname" id="fname" name="fname" value="<?php echo($_SESSION['fname']); ?>">
                    </span>
                    <span>
                            <label for="lname">Last Name</label>
                            <input type="text" placeholder="Lastname" id="lname" name="lname" value="<?php echo($_SESSION['lname']); ?>">
                    </span>
                    <span>
                            <label for="uname">Username</label>
                            <input type="text" placeholder="Username" id="email" name="email" value="<?php echo($_SESSION['email']); ?>"> 
                    </span>
                    <span>
                            <button type="submit">Save</button>
                    </span> 
                </form>
            </div>
        </section>
    </main>
<?php
    require "./template/footer.php";
    load_footer([]);
?>