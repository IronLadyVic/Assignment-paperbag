<?php

session_start();

unset($_SESSION['MemberID']);
unset($_SESSION['firstName']);
header('location: index.php');


?>