<?php 

echo "logging out please wait !!!";
session_start();
session_destroy();
 header("location:/forum/index.php");
?>