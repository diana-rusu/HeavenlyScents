
 <?php
    include('header.php');
?>

              <div class="title">
                <h3>Login Form</h3>
              <form action="core/action_handler.php" method="post">
                <fieldset>
                    <div class="field"><label>Username:</label><input type="text" class="text" value="" name="username"></div>
                  <div class="field"><label>Password:</label><input type="password" class="password" value="" name="password"></div>
                  <div class="field">
                      <label for="checkbox">Remember me</label> <input type="checkbox" name="checkbox" id="checkbox">
                  </div>
                  <ul>
                      <li><a href="#">Forgot your password?</a></li>
                    <li><a href="signup.php">Create an account.</a></li>
                  </ul>
                  <div class="wrapper">
                      <input type="submit" value="Login">
                      <input type="hidden" name="action" value="user_login">
                  </div>
                </fieldset>
              </form>
           </div>
       
 
 <?php
    include('footer.php');
?>