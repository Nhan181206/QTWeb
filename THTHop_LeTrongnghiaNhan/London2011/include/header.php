<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/script.js"></script>
</head>
<body>
<div id="band"></div>
<div id="wrapper">
  <div id="banner">
    <a href="index.php">
      <span class="slogan">Dedicated to delicious British Food</span>
      <span class="ten">GORDON&rsquo;S CROWN</span>
    </a>
  </div>
  <ul id="nav">
    <li <?php if ($trang == "home") echo "class='current'"; ?>><a href="index.php">Home</a></li>
    <li <?php if ($trang == "menu") echo "class='current'"; ?>><a href="menu.php">Menu</a></li>
    <li <?php if ($trang == "contact") echo "class='current'"; ?>><a href="contact.php">Contact</a></li>
    <li <?php if ($trang == "login") echo "class='current'"; ?>><a href="login.php">Login</a></li>
  </ul>
  <div id="content">
