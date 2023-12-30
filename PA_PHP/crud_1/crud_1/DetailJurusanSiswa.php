<?php 
    include_once 'header.php';
    include_once 'sidebar.php';
?>
<?php 
    require_once 'models/dbkoneksi.php';
    include_once 'detailJurusan.php';

    $hal = $_REQUEST['hal'];
 
    if(!empty($hal)){
        include_once $hal.'.php';
    }
    else{
        include_once 'home.php';
    }
?>
<?php 
    include_once 'footer.php';
?>wd