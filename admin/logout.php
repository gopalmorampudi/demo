<?php
session_start();
unset($_SESSION['adminuser']);
header("Location:index.php");
?> 