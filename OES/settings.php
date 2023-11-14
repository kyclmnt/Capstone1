<?php
require "./template/head.php";

if (!isset($_SESSION['role'])) { header("Location:login.php"); die;} 
if($_SESSION['role'] === "S") { header("Location: abisform.php"); die; }

load_header("ABIS | Settings", ["main", "settings", "footer"], ["settings"]);

?>
<main>
    <section class="container">
        <div class="flex gap-5">
            <div class="setting">
                <h2>
                    SETTINGS
                </h2>
                <ul class="nav nav-pills d-flex flex-column">
                    <li class="nav-item">
                        <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true" onclick="showUserProfile()"><i class="fa-solid fa-user"></i> Account</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" id="v-pills-password-tab" data-bs-toggle="pill" data-bs-target="#v-pills-password" type="button" role="tab" aria-controls="v-pills-password" onclick="showUserPassword()"><i class="fa fa-lock"></i> Password</button>
                    </li>
                    <?php if ($_SESSION["role"] == 'A') { ?>
                        <li class="nav-item dropdown">
                            <!-- <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a> -->
                            <button class="nav-link dropdown-toggle" id="v-pills-manageusers-tab" data-bs-toggle="dropdown" aria-expanded="false" type="button"><i class="fa fa-users"></i> Manage User</button>
                            <ul class="dropdown-menu nav-pills">
                                <li><button id="v-pills-viewuser-tab" class="nav-link dropdown-item" data-bs-target="#v-pills-viewuser" data-bs-toggle="pill" onclick="viewUsers()">View User</button></li>
                                <li><button id="v-pills-createuser-tab" class="nav-link dropdown-item" data-bs-target="#v-pills-createuserd" data-bs-toggle="pill" onclick="createUser()">Create new User</button></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <form action="" method="post" class="d-flex flex-column flex-grow-1">
                <div class="form-title">

                </div>
                <div class="form-body border p-3 rounded">

                </div>
            </form>
            <table id="table" class="hide"></table>
        </div>
    </section>
</main>
<?php
require "./template/footer.php";
load_footer([]);
?>