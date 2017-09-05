<?php
    function connect_to_db()
    {
        //$con = mysql_connect(db_host,db_user,db_password);
        //$con = mysql_connect(db_host,'admin','admin');
        $con = mysql_connect('localhost','root');
        if (!$con)
        {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db('heavenlyscents', $con);   
    }
    function verify_is_admin_logged()
    {
        if(isset($_SESSION['user_id'])&&$_SESSION['user_type']==1)
            return 1;
        else
            return 0;
    }
    function verify_is_user_logged()
    {
       
        if(isset($_SESSION['user_id'])&&$_SESSION['user_type']==0)
            return 1;
        else
            return 0;
    }
    function login($username,$password)
    {
        
        $sql='SELECT * FROM users WHERE username="'.$username.'" AND password="'.$password.'"';

        $res=mysql_query($sql);
        if(mysql_numrows($res)>0)
        {
            $field=mysql_fetch_array($res);
           
            $_SESSION['user_id']=$field['id'];
            $_SESSION['user_type']=$field['type'];
            $_SESSION['user_email']=$field['email'];
            return 1; 
        }
        return 0;
    }
    function add_category($category)
    {
        $sql='SELECT * FROM categories WHERE name="'.$category.'"';
        $res=mysql_query($sql);
        if(mysql_numrows($res)==0)
        {
            $sql='INSERT INTO categories (id,name) VALUES (null,"'.$category.'")';
           
            mysql_query($sql);
            return 1;
        }
        return 0;
        
    }
    
    function get_categories()
    {
        $sql='SELECT * FROM categories';
        $res=mysql_query($sql);

        $categories=array();
        $i=0;
        while($field=mysql_fetch_array($res))
        {
            $categories[$i]['id']=$field['id'];
            $categories[$i]['name']=$field['name'];
            $i++;
        }
        return $categories;
    }
    function delete_category($category_id)
    {
        $sql='SELECT * FROM categories WHERE id='.$category_id;
        $res=mysql_query($sql) ;
        if(mysql_numrows($res))
        {
            $sql='DELETE FROM categories WHERE id='.$category_id;
            mysql_query($sql);
            return 1;
        }
        return 0;
    }
    function add_products($product)
    {
       
        
    }
    function get_products($category_id='')
    {
        if($category_id=='')
            $sql='SELECT * FROM products';
        else
            $sql='SELECT * FROM products WHERE category_id='.$category_id;
        $res=mysql_query($sql);

        $products=array();
        $i=0;
        while($field=mysql_fetch_array($res))
        {
            $products[$i]['id']=$field['id'];
            $products[$i]['name']=$field['name'];
            $products[$i]['category_id']=$field['category_id'];
            $products[$i]['price']=$field['price']; 
            $products[$i]['description']=$field['description']; 
            $products[$i]['quantity']=$field['quantity'];
            $products[$i]['promotion']=$field['promotion']; 
            $products[$i]['picture']=$field['picture'];  
            $i++;
        }
        return $products;
    }
    function delete_product($product_id)
    {
        $sql='SELECT * FROM products WHERE id='.$product_id;
        $res=mysql_query($sql) ;
        if(mysql_numrows($res))
        {
            $field=mysql_fetch_array($res);
            $sql='DELETE FROM products WHERE id='.$product_id;
            mysql_query($sql);
            unlink('../admin/upload/'.$field['picture']);
            return 1;
        }
        return 0;
    }
    function delete_image($product_id)
    {
         $sql='SELECT picture FROM products WHERE id='.$product_id;
         $res=mysql_query($sql) ;
         $field=mysql_fetch_array($res); 
         $result='UPDATE products SET picture="" WHERE id='.$product_id;
         mysql_query($result);
         unlink('../admin/upload/'.$field['picture']);
    } 
    function get_product($product_id)
    {
        $sql='SELECT * FROM products WHERE id='.$product_id;
        $res=mysql_query($sql) ;
        $field=mysql_fetch_array($res); 
         return $field;       
        
        
    }
    function get_category($category_id)
    {
        $sql='SELECT * FROM categories WHERE id='.$category_id;
        $res=mysql_query($sql) ;
        $field=mysql_fetch_array($res); 
         return $field;       
        
        
    }
    
    
    
     connect_to_db();
    
    
?>
