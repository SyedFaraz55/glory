<?php session_start(); ?>
<?php include 'includes/header.php' ?>

<?php

 if(isset($_SESSION['user'])){
   header('location:dashboard.php');
 }
$error = '';
  if(isset($_POST['submit'])) {
    $username = $_POST['loginid'];
    $password = $_POST['password'];
    if($username == 'gloryteam' & $password == 'glory33'){
      $_SESSION['user'] = 'gloryteam';
      header('location:dashboard.php');
    } else {
      $error = 'please enter correct credentials !';
    }
  }

?>

    <section>
        <div class="login">
          <h5><?php echo $error;?></h5>
            <form method="POST" action="login.php">
                <h3>Login</h3>
                <div style="margin-bottom: 20px;"></div>
                <div>
                    <input type="text" name="loginid" placeholder="login id">
                </div>
                <div>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div>
                    <input type="submit" name="submit" value="login" id="submit">
                </div>
            </form>
        </div>
    </section>
</body>
</html>
