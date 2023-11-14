<?php
session_start();
require_once "constants.php";
?>

<?php
function set_title(String $title)
{ ?>
    <title><?= $title ?></title>
<?php } ?>


<?php
function set_css(array $css = [])
{
    foreach ($css as $c) { ?>
        <link rel="stylesheet" href="<?= base_url("assets/css/{$c}.css") ?>">
<?php }
} ?>

<?php
function set_js(array $js = [])
{
    foreach ($js as $j) { ?>
        <script src="<?= base_url("assets/js/{$j}.js") ?>" defer></script>
<?php
    }
}
?>
<?php
function load_header(String $title = "Document", array $css = [], array $js = [], bool $show = true)
{ ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= set_Title($title) ?>


        <!-- BOOTSTRAP -->
        <link href="<?= base_url("assets/libraries/bootstrap/bootstrap.min.css") ?>" rel="stylesheet">
        <script src="<?= base_url("assets/libraries/bootstrap/bootstrap.min.js") ?>"></script>

        <!-- fontawesome -->
        <link rel="stylesheet" href="<?= base_url("assets/libraries/fontawesome/fontawesome.min.css") ?>">
        <script src="<?= base_url("assets/libraries/fontawesome/fontawesome.min.js") ?>"></script>

        <!-- JQUERY -->
        <script src="<?= base_url("assets/libraries/jquery/jquery.min.js") ?>"></script>
    

        <!-- Chart JS -->
        <script src="<?= base_url("assets/libraries/chartjs/chart.min.js") ?>" defer></script>

        
        <link rel="stylesheet" href="<?= base_url("assets/css/base.css") ?>">
        <!-- <link rel="stylesheet" href="<?= base_url("assets/css/main.css") ?>"> -->
        <link rel="stylesheet" href="<?= base_url("assets/css/header.css") ?>">
        <link rel="stylesheet" href="<?= base_url("assets/css/footer.css") ?>">
        
        <?= set_css($css) ?>
        
        <!-- datatable -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css"> -->
        <link rel="stylesheet" href="<?= base_url("assets/libraries/datatable/datatable.min.css") ?>">
        <script src="<?= base_url("assets/libraries/datatable/datatable.min.js") ?>" defer></script>
        

        <!-- Global JS files -->
        <script src="<?php echo base_url("assets/js/main.js") ?>"></script>

    
        <?= set_js($js); ?>

        <!-- Custom JS -->
        <script>
            const base_url = "<?= BASE_PATH ?>";
            console.log(base_url);

            </script>
        <?php
        if (isset($_SESSION['role'])) {
            ?>
            <script>
                const uid = "<?= $_SESSION['uid'] ?>";
                let role = "<?= $_SESSION['role'] ?>";
                let fname = "<?= $_SESSION['fname'] ?>";
                let lname = "<?= $_SESSION['lname'] ?>";
                let email = "<?= $_SESSION['email'] ?>";
            </script>
        <?php
        }
        ?>
    </head>
    <?php if($show) {?>
    <header>
        <div id="logo-holder ">
            <img src="logo.png" alt="Andres Bonifacio Integrated School Logo" style="width:50px;height:50px" ;>
            Andres Bonifacio Integrated School
        </div>
        <nav class="nav">
            <?php
            if (isset($_SESSION["role"])) {
            ?>
                <?php echo $_SESSION['role'] == "A" ? '<a class="nav-link" id="dashboard" href="dashboard.php">Dashboard</a>' : ''; ?>
                <a class="nav-link" id="students" href="student.php">Students</a>
                <a class="nav-link" id="settings" href="settings.php">Settings</a>
                <a class="nav-link" href="<?= BASE_PATH; ?>api/logout.php">Logout</a>
            <?php
            } else {
            ?>
                <a class="nav-link" href="login.php">Login</a>
            <?php }
            ?>
        </nav>
    </header>
    <?php } ?>
    <body>

    <?php } ?>