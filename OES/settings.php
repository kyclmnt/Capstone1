<?php
require "./template/head.php";
load_header("Settings", ["main", "settings", "footer"], ["settings"]);

?>
<main>
    <section>
        <div class="setting">
            <h1>
                SETTINGS
            </h1>
            <ul class="nav nav-pills d-flex flex-column">
                <li class="nav-item">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-user"></i> Account</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"><i class="fa fa-lock"></i> Password</button>
                </li>
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a> -->
                    <button class="nav-link dropdown-toggle" id="v-pills-messages-tab" data-bs-toggle="dropdown" aria-expanded="false" type="button"><i class="fa fa-users"></i> Manage User</button>
                    <ul class="dropdown-menu">
                        <li><button class="nav-link dropdown-item">View User</button></li>
                        <li><button class="nav-link dropdown-item">Create new User</button></li>
                    </ul>
                </li>
                
            </ul>
        </div>
        <div class="user-profile">
            <h1>Account</h1>
            <form action="" method="post" id="form-container">
                <input type="hidden" name="id" value="<?= $_SESSION['uid']; ?>">
                <span>
                    <label for="fname" class="form-label">First Name</label>
                    <input type="text" class="form-control" placeholder="Firstname" id="fname" name="fname" value="<?php echo ($_SESSION['fname'] ?? ""); ?>">
                </span>
                <span>
                    <label for="lname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" placeholder="Lastname" id="lname" name="lname" value="<?php echo ($_SESSION['lname'] ?? ""); ?>">
                </span>
                <span>
                    <label for="uname" class="form-label">Username</label>
                    <input type="text" class="form-control" placeholder="Username" id="email" name="email" value="<?php echo ($_SESSION['email'] ?? ""); ?>">
                </span>
                <span>
                    <button type="submit" class="btn btn-success">Save</button>
                </span>
            </form>
        </div>
    </section>
</main>
<?php
require "./template/footer.php";
load_footer([]);
?>