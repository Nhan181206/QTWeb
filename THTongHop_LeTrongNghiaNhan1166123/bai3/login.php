<?php
$tieude = "Login";
$active = "login";
include("include/header.php");
?>
<h1>Login</h1>
<form method="post" action="login.php">
    <p>Username: <input type="text" name="username"></p>
    <p>Password: <input type="password" name="password"></p>
    <p><input type="submit" value="Login"></p>
</form>
<?php include("include/footer.php"); ?>
