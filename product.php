 <?php
    include('header.php');
?>
<?php
    $product_id=$_GET['product_id'];
    $product=get_product($product_id);
?>
<table>
    <tr>
        <td>
            <div class="title">
                <h2>
                    <?php 
                        echo $product['name'];
                    ?>
                </h2>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inside">
                <h1>
                    <?php
                        if($product['picture']=="")
                        {
                            echo "No picture";
                        }
                        else
                        {
                    ?>
            <img  border="0" src="admin/upload/<?php echo $product['picture']?>" width="400" height="300" />
            <?php
                }
                                  
            ?>
                </h1>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inside">
                <h2>
                    <?php 
                        echo $product['description'];
                    ?>
                </h2>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inside">
                <h1>
                    <?php
                        if($product['quantity']>1) 
                            echo 'In STOCK';
                        else
                            echo 'Not available';
                    ?>
                </h1>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inside">
                <h1>Promotion :
                    <?php
                        if($product['promotion']==1)
                        {
                            echo "YES";
                        }
                        else
                        {
                            echo "NO";
                        }
                    ?>
                </h1>
            </div>
        </td>
    </tr>
    <tr>
        <td>
            <div class="inside">
                <h3>
                Price: $
                    <?php 
                        echo $product['price'];
                    ?>
                </h3>
            </div>
        </td>
    </tr>
    <tr>
        <td>
        <?php
            if(verify_is_user_logged())
            {
        ?>
            <div class="wrapper"><a href="core/action_handler.php?action=buy&product_id=<?php echo $product_id;?>" class="button">Buy</a></div>
            </div>
        <?php
            }
            else
            echo '<h3>For ordering you have to log into your account!</h3>';
        ?>
        </td>
    </tr>
    
             
</table>
 <?php
    include('footer.php');
?> 
