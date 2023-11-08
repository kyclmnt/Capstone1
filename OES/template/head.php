<?php
session_start(); 
require_once "constants.php";
?>

<?php 
function set_title(String $title) { ?>
<title><?=$title?></title>
<?php }?>


<?php 
function set_css(Array $css = []) {
    foreach($css as $c) {?>
    <link rel="stylesheet" href="<?=base_url("assets/css/{$c}.css")?>">
<?php }
}?>

<?php
function set_js(Array $js = []) {
    foreach($js as $j) { ?>
        <script src="<?=base_url("assets/js/{$j}.js")?>" defer></script>
    <?php
    }
}
?>
<?php
function load_header(String $title = "Document", Array $css = [], Array $js = []) {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?=set_Title($title)?>


    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="<?=base_url("assets/fontawesome/css/all.min.css")?>">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url("assets/datatable/css/dataTables.dataTables.min.css")?>">
    
    <link rel="stylesheet" href="<?=base_url("assets/css/base.css")?>">
    <!-- <link rel="stylesheet" href="<?=base_url("assets/css/main.css")?>"> -->
    <link rel="stylesheet" href="<?=base_url("assets/css/header.css")?>">
    <link rel="stylesheet" href="<?=base_url("assets/css/footer.css")?>">

    <?=set_css($css)?>    

   

    <!-- JQUERY -->
    <script src="<?=base_url("assets/jquery/jquery.min.js")?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.7/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?=set_js($js);?>

    <!-- Custom JS -->
    <script>
        const base_url = "<?= BASE_PATH ?>";
    </script>
</head>


<header>
    <div id="logo-holder">
        <img src="logo.png" alt="" style="width:50px;height:50px";>
        Andres Bonifacio Integrated School
    </div> 
    <nav class="nav">
        <?php 
        if(isset($_SESSION["role"])){
        ?>
            <a class="nav-link active" href="dashboard.php">Dashboard</a>
            <a class="nav-link" href="student.php">Students</a>
            <a class="nav-link" href="settings.php">Settings</a>
            <a class="nav-link" href="<?=BASE_PATH;?>api/logout.php">Logout</a>
        <?php 
        }else{
        ?>
            <a class="nav-link" href="login.php">Login</a>
        <?php }
        ?>        
    </nav>
</header>

<body >

<?php }?>