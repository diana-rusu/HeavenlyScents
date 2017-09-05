<?php
include('../config.php');
include('../core/core_functions.php');
if(!verify_is_admin_logged()&&!strstr( $_SERVER['REQUEST_URI'],'login')&&!strstr( $_SERVER['REQUEST_URI'],'index'))
    header('Location:login.php');

 if(isset($_SESSION['error_mess']))
{
   
?>
    <script>
        alert('<?php echo $_SESSION['error_mess'];?>') ;  
    </script> 
<?php
 unset($_SESSION['error_mess']);
}

?>

<html>
 <link rel="stylesheet" href="../css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="all">  
    <body id="page1">
       <center>
            <table width="1000">
            
                <tr>
                    <td align="right">
                        <header>
                            <div class="container">
                             <ul class="top-nav">
                                <li class="first"><a href="index.php" class="about">Home</a></li>  
                                <li><a href="category.php">Category</a></li>  

                                <li><a href="products.php"> Products </a></li> 
                                <?php if(verify_is_admin_logged())
                                    echo '<li><a href="logout.php"> Logout </a></li>';
                                else
                                    echo '<li><a href="login.php"> Login </a></li>'; 
                                ?>
                               </ul>
                            </div>   
                        </header>
                    </td>


                 </tr>
                
        
                <tr >
                    <td style="" align="">
               
                   
