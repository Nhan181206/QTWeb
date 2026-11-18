<?php
session_start();
$trang = "login";
$title = "Gordon's Crown - Login";
$loi = "";
if (isset($_POST['btLogin'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == "admin")
        $_SESSION['username'] = $_POST['username'];
    else
        $loi = "Invalid username or password";
}
include "include/header.php";
?>
    <h1>Login</h1>
    <form method="post" action="">
      <table class="form">
        <tr><td>Username</td><td><input type="text" name="username"></td></tr>
        <tr><td>Password</td><td><input type="password" name="password"></td></tr>
        <tr><td></td><td><input type="submit" name="btLogin" value="Login" class="submit"></td></tr>
      </table>
    </form>
    <?php if ($loi != "") echo "<div class='error'>$loi</div>"; ?>
<?php include "include/footer.php"; ?>
