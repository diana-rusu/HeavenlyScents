
 <?php
    include('header.php');
?>
<div class="title">
                <h3>Sign Up</h3>
              <form action="core/action_handler.php" method="post">
                <fieldset>
                <table cellpadding="2">
                     <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>First name:</label>
                        </td>
                        <td>
                            <input type="text" class="text" value="" name="first_name" size="27"></div>
                        </td>
                     </tr>
                      <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Last name:</label>
                        </td>
                        <td>
                           <input type="text" class="text" value="" name="last_name" size="27"></div>
                        </td>
                     </tr>
                     <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Username:</label>
                        </td>
                        <td>
                           <input type="text" class="text" value="" name="username" size="27"></div>
                        </td>
                     </tr>
                     <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Password:</label>
                        </td>
                        <td>
                           <input type="password" class="text" value="" name="password_1" size="27"></div>
                        </td>
                     </tr>
                      <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Repeat Password:</label>
                        </td>
                        <td>
                            <input type="password" class="text" value="" name="password_2" size="27"></div>
                        </td>
                     </tr>
                     <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Address:</label>
                        </td>
                        <td>
                            <input type="text" class="text" value="" name="adress" size="30"></div>
                        </td>
                     </tr>
                     <tr>
                        <td nowrap="nowrap">
                            <div class="field"><label>Phone number:</label>
                        </td>
                        <td>
                             <input type="text" class="text" value="" name="nb_phone" size="27"></div>
                        </td>
                     </tr>
                     <tr>
                        <td nowrap="nowrap">
                           <div class="field"><label>E-mail:</label>
                        </td>
                        <td>
                              <input type="text" class="text" value="" name="email" size="27"></div>
                        </td>
                     </tr>
              </table>
                                <div class="wrapper">
                            <input type="submit" name="submit" value="Sign up">
                        <input type="hidden" name="action" value="sign_up">
                  </div>
                </fieldset>
              </form>
           </div>
 <?php
    include('footer.php');
?>