<!--
    Autor: Alex Glaser
    erstellt am: 28.03.2023
-->

<?php
session_start();
session_destroy();
header("Location: ../index.php");
?>