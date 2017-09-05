<?php
include('../config.php');
include('core_functions.php');
connect_to_db();

$action='';
if(isset($_GET['action'])&&$_GET['action']!='')
    $action=$_GET['action']; 
if(isset($_POST['action'])&&$_POST['action']!='')
    $action=$_POST['action'];

    
if($action=='admin_login')  
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==''||$password=='')
    {
        $_SESSION['error_mess']='Invalid input' ;
        header('Location:login.php');
    }

    if(login($username,$password))
    {
        header('Location:../admin/index.php');    
    }
    else
    {
        header('Location:../admin/login.php');    
    }
}
if($action=='sign_up')
{
    
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $username=$_POST['username'];
    $password_1=$_POST['password_1'];
    $password_2=$_POST['password_2'];
    $adress=$_POST['adress'];
    $nb_phone=$_POST['nb_phone'];
    $email=$_POST['email'];
    $error_mess='';    
    if($first_name=='')
        $error_mess='Invalid First Name'.'|';  
    if($last_name=='')
        $error_mess.='Invalid Last Name'.'|';
    if($username=='')
        $error_mess.='Invalid Username'.'|';
    if($password_1=='')
        $error_mess.='Invalid password_1'.'|';
    if($password_2=='')
        $error_mess.='Invalid password_2'.'|';
    if($adress=='')
        $error_mess.='Invalid adress'.'|';
    if($nb_phone=='')
        $error_mess.='Invalid  number phone'.'|';
    if($email=='')
        $error_mess.='Invalid e-mail hmm';
    
     if($error_mess==''&&$password_1==$password_2) 
    {
          
        $sql='INSERT INTO users (first_name,last_name,adress,number_phone,email,username,
        password,type) VALUES("'.$first_name.'","'.$last_name.'","'.$adress.'",
        "'.$nb_phone.'","'.$email.'","'.$username.'","'.$password_1.'",0)';
       
       mysql_query($sql);
        header("Location:../index.php");
    }
    else
    {
    $_SESSION['error_mess']=$error_mess;
    header("Location:../signup.php");
    
    }
    
    
}
if($action=='add_category')  
{
    $category=$_POST['category'];
    if($category=='') 
    {
        $_SESSION['error_mess']='Invalid input';
        header('Location:../admin/category.php');
    } 
    if(add_category($category)) 
    {
        header('Location:../admin/category.php');
    }
    else
    {
        $_SESSION['error_mess']='Category is used';  
        header('Location:../admin/category.php');
    }             
}

if($action=='delete_category')  
{
    $category_id=$_GET['category_id'];
    if(delete_category($category_id)) 
    {
        header('Location:../admin/category.php');
    }
    else
    {
        $_SESSION['error_mess']='Category id is invalid';  
        header('Location:../admin/category.php');
    }             
}
if($action=='add_products')  
{

    $name=$_POST['name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
    $description=$_POST['description'];
    $promotion=0;
    if(isset($_POST['promotion']))
        $promotion=1;
    $category_id=$_POST['category_id'];
    $error_mess='';
    if($name=='')
        $error_mess='Invalid product name'.'|';
    if($price=='')
        $error_mess.='Invalid product name'.'|';
    if($quantity=='')
        $error_mess.='Invalid quantity value'.'|';    
    if($category_id=='')
        $error_mess.='Invalid category'.'|'; 
    
    
    if($error_mess=='') 
    {
          
        $sql='INSERT INTO products (name,category_id,price,description,quantity,promotion) VALUES("'.$name.'","'.$category_id.'","'.$price.'","'.$description.'","'.$quantity.'","'.$promotion.'")';
    
        $res=mysql_query($sql);
    
        $last_id=mysql_insert_id();
        if(isset($_FILES["file"]["type"])&&$_FILES["file"]["type"]!='')
        {
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/JPG")))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    $error_mess.= "Return Code uploading file: " . $_FILES["file"]["error"].'|';
                }
                else
                {
                    $extension_array=explode('/',$_FILES['file']["type"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"],"../admin/upload/" . $last_id.'.'.$extension_array[1]);

               
                }
            }
            else
            {
                $error_mess.= 'Invalid file'.'|';
            }
            if($error_mess!='')
            {
                $sql='DELETE FROM products WHERE id='.$last_id;
                mysql_query($sql);
               
            }
            else
            {
                $sql='UPDATE products SET picture="'.$last_id.'.'.$extension_array[1].'" WHERE id='.$last_id;
                mysql_query($sql);
                
            }
        } 
        if($error_mess=='')
            header("Location:../admin/products.php");
        else
        {
            $_SESSION['error_mess']=$error_mess;
            header("Location:../admin/products.php");
            
        }
    
    }
    else
        {
        $_SESSION['error_mess']=$error_mess;
        header("Location:../admin/products.php");
        
        }
    
    
        
}
if($action=='buy')  
{
    $product_id=$_GET['product_id'];
    $product=get_product($product_id);
    
    if(isset($product['id']))
    {
        if($product['quantity']>0)
        {
            $sql='UPDATE products SET quantity="'.($product['quantity']-1).'"WHERE id='.$product_id;;
            mysql_query($sql);
            // multiple recipients
            $to  = $_SESSION['user_email'] . ', '; // note the comma
            $to .= 'dayanne_987@yahoo.es';

            // subject
            $subject = 'new sale';

            // message
            $message = 'The product '.$product['name'].' is sold to user id='.$_SESSION['user_id'].'. Thank you for you order.';

            // To send HTML mail, the Content-type header must be set
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            // Additional headers
       
            $headers .= 'From: HeavenlyScentsofTexas <administrator@heavenlyscentsoftexas.com>' . "\r\n";
            

            // Mail it
            mail($to, $subject, $message, $headers);
            $date=date("Y-m-d");            
     
            $sql='INSERT INTO orders (product_id,user_id,date,ordered_prossesed) VALUES("'.$product_id.'","'.$_SESSION['user_id'].'"."'.$date.'",0)';
            mysql_query($sql);
            header('Location:../product.php?product_id='.$product_id);

        }
        else
        {
              $_SESSION['error_mess']='Product id not available.';  
              header('Location:../product.php?product_id='.$product_id);
        }
    }
    else
    {
        $_SESSION['error_mess']='Product id is invalid';  
        header('Location:../product.php?product_id='.$product_id);
    }
}
if($action=='delete_product')  
{
    $product_id=$_GET['product_id'];
    if(delete_product($product_id)) 
    {
        header('Location:../admin/products.php');
    }
    else
    {
        $_SESSION['error_mess']='Product id is invalid';  
        header('Location:../admin/products.php');
    }             
}
if($action=='delete_picture') 
{
    $product_id=$_GET['product_id'];
    delete_image($product_id);
    header('Location:../admin/edit_product.php?product_id='.$product_id); 
}
if($action=='edit_product') 
{
        $product_id=$_POST['product_id'];  
        $name=$_POST['name'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];
        $description=$_POST['description'];
        $promotion=0;
        if(isset($_POST['promotion']))
        $promotion=1;
        $category_id=$_POST['category_id'];
        $error_mess=''; 
        if($name=='')
        $error_mess='Invalid product name'.'|';
        if($price=='')
        $error_mess.='Invalid product price'.'|';
        if($quantity=='')
        $error_mess.='Invalid quantity value'.'|';    
        if($category_id=='')
        $error_mess.='Invalid category'.'|'; 
        if($error_mess=='') 
        {
          
            $sql='UPDATE products SET name="'.$name.'",price="'.$price.'",quantity="'.$quantity.'"
           ,description="'.$description.'",category_id="'.$category_id.'",promotion="'.$promotion.'"
            WHERE id='.$product_id;
           // mysql_query($sql);

        $res=mysql_query($sql);
        if(isset($_FILES["file"]["type"])&&$_FILES["file"]["type"]!='')
        {
            if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg")
            || ($_FILES["file"]["type"] == "image/jpg")
            || ($_FILES["file"]["type"] == "image/JPG")))
            {
                if ($_FILES["file"]["error"] > 0)
                {
                    $error_mess.= "Return Code uploading file: " . $_FILES["file"]["error"].'|';
                }
                else
                {
                    $extension_array=explode('/',$_FILES['file']["type"]);
                    move_uploaded_file($_FILES["file"]["tmp_name"],"../admin/upload/" . $product_id.'.'.$extension_array[1]);

               
                }
            }
            else
            {
                $error_mess.= 'Invalid file'.'|';
            }
            if($error_mess!='')
            {
                $sql='DELETE FROM products WHERE id='.$product_id;
                mysql_query($sql);
               
            }
            else
            {
                $sql='UPDATE products SET picture="'.$product_id.'.'.$extension_array[1].'" WHERE id='.$product_id;
                mysql_query($sql);
                
            }
        }  
        if($error_mess=='')
            header('Location:../admin/edit_product.php?product_id='.$product_id);
        else
        {
            $_SESSION['error_mess']=$error_mess;
            header('Location:../admin/edit_product.php?product_id='.$product_id);
            
        }
    
    }
    else
        {
        $_SESSION['error_mess']=$error_mess;
        header("Location:../admin/edit_product.php?product_id=".$product_id);
        
        }
       
}
if($action=='edit_category') 
{
        $category_id=$_POST['category_id'];  
        $name=$_POST['name'];
        if($name=='')
        $error_mess='Invalid category name';
         if($error_mess=='') 
        {
          
            $sql='UPDATE categories SET name="'.$name.'"
            WHERE id='.$category_id;
            mysql_query($sql);
            header("Location:../admin/category.php");
           
        }
        else
        {
             $_SESSION['error_mess']=$error_mess;
             header("Location:../admin/category.php");
            
        }
}
if($action=='user_login')  
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==''||$password=='')
    {
        $_SESSION['error_mess']='Invalid input' ;
        header('Location:../login.php');
    }

    if(login($username,$password))
    {
        header('Location:../index.php');    
    }
    else
    {
        header('Location:../login.php');    
    }
}
?>

