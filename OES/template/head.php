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
    <link rel="stylesheet" href="<?=base_url("assets/bootstrap/css/bootstrap.min.css")?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?=base_url("assets/fontawesome/css/all.min.css")?>">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?=base_url("assets/datatable/css/dataTables.dataTables.min.css")?>">
    
    <link rel="stylesheet" href="<?=base_url("assets/css/main.css")?>">
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


<body >

<?php }?>