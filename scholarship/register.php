<?php include('function.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
<div class="cont">
    <div class="form sign-in">
      <div class="header">
  <h2>Login</h2>

 <form method="post" action="register.php">

   

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="submit" name="login_btn">Login</button>
    </div>
     <?php echo display_error(); ?>
    
  </form>
  </div>

    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
           <div class="header">
  <h2>Register</h2>

      <div class="form sign-up">
        <form method="post" action="register.php">
  
  

  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username" value="<?php echo $username; ?>">

    
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password_1">
  </div>
  <div class="input-group">
    <label>Confirm password</label>
    <input type="password" name="password_2">
  </div>
  <div class="input-group">
    <button type="submit" class="submit" name="register_btn">Register</button>
    <?php echo display_error(); ?>
  </div>
 
</form>

       
      </div>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>

</body>
</html>