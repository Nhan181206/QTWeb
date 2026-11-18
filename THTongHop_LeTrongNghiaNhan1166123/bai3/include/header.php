<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $tieude; ?> - Gordon's Crown</title>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link rel="alternate" type="application/rss+xml" title="Gordon's Crown menu" href="rss.php">
</head>
<body>
<div class="wrapper">
<header>
    <!-- Banner có chứa liên kết quay về trang Home (index.php) -->
    <a href="index.php"><img src="images/banner.svg" alt="Gordon's Crown" title="Back to Home"></a>
</header>
<nav>
    <ul>
        <li><a href="index.php"<?php if ($active == "home") echo ' class="active"'; ?>>Home</a></li>
        <li><a href="menu.php"<?php if ($active == "menu") echo ' class="active"'; ?>>Menu</a></li>
        <li><a href="contact.php"<?php if ($active == "contact") echo ' class="active"'; ?>>Contact</a></li>
        <li><a href="login.php"<?php if ($active == "login") echo ' class="active"'; ?>>Login</a></li>
    </ul>
</nav>
<div class="content">
