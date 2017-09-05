
<?php
    include('header.php');
?>
<form action="../core/action_handler.php" method="post">
<table cellpadding="2">
    <tr>
        <td>
            Username:
        </td>
        <td>
            <input type="text" name="username">
        </td>
    </tr>
        <tr>
        <td>
            Password:
        </td>
        <td>
             <input type="password" name="password">
        </td>
    </tr>
    </tr>
        <tr>
        <td>
        </td>
        <td>
             <input type="submit" value="Login">
        </td>
    </tr>
</table>
   
    
    <input type="hidden" name="action" value="admin_login">
</form>
<?php
    include('footer.php');
?>