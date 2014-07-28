<?php

session_start();

if(isset($_SESSION['MemberID'])){
	
unset($_SESSION['MemberID']);
}
header('location: index.php');


?>