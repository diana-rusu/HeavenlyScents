<?php
include('config.php');
    
include('core/core_functions.php');


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

<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">  
  <!--[if lt IE 7]>
      <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
    <script type="text/javascript" src="js/ie_png.js"></script>
    <script type="text/javascript">
        ie_png.fix('.png, .logo img, .nav-box ul li, .list1 li');
    </script>
  <![endif]-->
  <!--[if lt IE 9]>
      <script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>

<body id="page3">
  <header>
    <div class="container">
      
      <ul class="top-nav">
<?php                   
    if(verify_is_user_logged())
        echo '<li><a href="index.php"> Home </a></li><li><a href="logout.php" class="login">Logout</a></li><li><a href="about.php"> About </a></li>';
                
    else
        echo '<li><a href="index.php"> Home </a></li><li><a href="login.php"> Login </a></li><li><a href="signup.php" class="signup">Signup</a></li><li><a href="about.php"> About </a></li>'; 
    ?> 
       
      </ul>
    </div>
  </header>
     <!-- content -->
  <section id="content">
    <div class="container">
        <div class="wrapper">
          <aside>
            <!-- .nav-box -->
            <div class="nav-box">
              <div class="inner">
              <?php
                $categories=get_categories();
              ?>
                <h3>Categories</h3>
              <ul>
              <?php 
                    foreach($categories as $value)
                    {
                        echo '<li><a href="products.php?category_id='.$value['id'].'">'.$value['name'].'</a></li>';
                    }
              ?>
                 
              </ul>
          </div>
          </div>
          <!-- /.box -->
        </aside>
        <section id="mainContent">