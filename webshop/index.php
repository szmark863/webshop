<?php require("header/header.php") ?>
<?php
//index.php alapértelmezett
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'landing';
//a lekért oldal betöltése
include $page . '.php';
?>
</div>
<?php require("footer/footer.php") ?>