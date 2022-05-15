<?php
session_start();

unset($_SESSION['auth']);
header("location:index.php?logout=1");

?>