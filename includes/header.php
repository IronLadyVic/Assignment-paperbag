<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/reset.css" type="text/css"/>
	<link rel="stylesheet" href="assets/pure.css" type="text/css"/>
	<link rel="stylesheet" href="assets/styles.css" type="text/css"/>
	<link rel="stylesheet" href="assets/gallery.css" type="text/css"/>
	<link type="text/css" media="print" rel="stylesheet" href="assets/print.css"/>
	<meta name="description" content="PaperBag Boutique sell items, view items, my paperbag, edit my account">
	<meta name="keywords" content="PaperBag Boutique - edit my account, shop online, collections, second hand labelled clothing, create an account, sell, login, browse brands, labels, second hand brands, sell your second hand clothes, item name, description, size, label, upload photo, price, submit item, edit image, browse, click here, shop online, collections, 
	second hand labelled clothing, log out, labels, second hand brands">
	<meta name="author" content="Estelle Graham, paperbag boutique">


<title>PaperBag Boutique</title>
</head>
<body>
<?php
require_once('includes/member.php');

echo '<div id="main-container">';
// session_start();
if(isset($_SESSION['MemberID'])){

	$oMember = new Member();

	$oMember->load($_SESSION['MemberID']);

//so if the member is logged in do this
echo'
<div id="top-left-nav">
	<ul>
		<li id="logo"><a href="index-loggedin.php">Home</a></li>
		<li id="shop-online-header"><a href="producttype.php">shop online</a></li>
		<li id="sell-header"><a href="sell-an-item.php">sell</a></li>
		
	</ul>
</div>
<!-- right navigation -->
<div id="top-right-nav">
	<p id="welcome">welcome</p><span id="welcome-username">';
echo htmlentities(''.$oMember->FirstName.'');
	echo '</span>
	<p id="items-im-selling"><a href="items-im-selling.php">items im selling</a></p>
	<ul>
		<li><a href="edit-my-account.php">edit my account</a></li>
		<li><a href="login.php">log out</a></li>
		<li><a href="my-paperbag-cart.php">my paperbag</a></li>
		<li id="cart"></li>
		<li id="A_I">(0)</li>
	</ul>
</div>';
//so if the member is not logged in do this
}else{
	echo '<div id="top-left-nav">
	<ul>
		<li id="logo"><a href="index-loggedin.php">Home</a></li>
		<li id="shop-online-header"><a href="producttype.php">shop online</a></li>
		
		
	</ul>
</div>
<!-- right navigation -->
<div id="top-right-nav">
	<ul>
		<li><a href="create-an-account.php">create my account</a></li>
		<li><a href="login.php">log in</a></li>
		<li><a href="login.php">my paperbag</a></li>
		<li id="cart"></li>
		<li id="A_I">(0)</li>
	</ul>
</div>';
}
?>