
<?php
 
  include('header.php'); 
?>
<?php
        $product_id=$_GET['product_id'];
        $product=get_product($product_id);
?>
  
<form action="../core/action_handler.php" method="post" enctype="multipart/form-data">
<p style="font-size: 30px;color: red;" align="center"> Edit product</p> 
<table cellpadding="2">
    <tr>
        <td nowrap="nowrap">Product name: 
        </td>
        <td>
            <input type="text" size="27" name="name" value="<?php echo $product['name']?>" >
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">Price: 
        </td>
        <td>
            <input type="text" size="27" name="price" value="<?php echo $product['price']?>" >
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">Description: 
        </td>
        <td>
            <textarea cols="25" rows="3" name="description" ><?php echo $product['description'] ?> </textarea>
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">Quatity: 
        </td>
        <td>
            <input type="text" size="27" name="quantity" value="<?php echo $product['quantity']?>">
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">Promotion : 
        </td>
        <td>
            <?php if($product['promotion']==1)
                { 
            ?>
                <input type="checkbox" name="promotion"  checked>
            <?php
                }
                else if($product['promotion']!=1)
                {
            ?>
                <input type="checkbox" name="promotion">
            <?php
                }
            ?> 
        </td>
    </tr>
     <tr>
        <td nowrap="nowrap">Category : 
        </td>
        <td>
            <select name="category_id">
                <option value="">Select category</option> 
                    <?php
                        $categories=get_categories();
                            foreach($categories as $key=>$value)
                            {
                                echo '<option value="'.$value['id'].'"';
                            if($product['category_id']==$value['id'])
                            {
                                echo 'selected="selected"';

                            } 
                                echo '>'.$value['name'].'</option> '; 

                             }
                    ?>

            </select>
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">
            <?php
                if($product['picture']=="")
                {
                    echo "No picture";
                }
                else
                {
            ?>
        </td>
        <td>
            <img  border="0" src="../admin/upload/<?php echo $product['picture']?>" width="200" height="150" /> 
        </td>
        <td>
             <?php
                $product=get_product($product_id);
                echo '<a href="../core/action_handler.php?action=delete_picture&product_id='.$product['id'].'">Delete</a>';
                }
                                  
            ?>
        </td>
    </tr>
    <tr>
        <td nowrap="nowrap">Change picture:
        </td>
        <td>
            <input type="file" name="file" id="file" value="<?php echo $product['picture']?>">
        </td>
        
    </tr>
    <tr>
        <td>
        </td>
        <td>
           <input type="submit" align="right" value="Edit">
        </td>
    </tr>
</table>
<input type="hidden" name="action" value="edit_product">
<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
</form>

<?php
     include('footer.php'); 
?>