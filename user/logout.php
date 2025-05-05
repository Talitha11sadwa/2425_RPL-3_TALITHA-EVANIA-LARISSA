<?php
session_destroy();
session_start();
session_unset();

header("Location: ../index.php");
?>