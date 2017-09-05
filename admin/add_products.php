
 <?php
    include('header.php');
?>

<form action="../core/action_handler.php" method="post" enctype="multipart/form-data">

<p style="font-size: 30px;color: red;" align="center"> Add Product</p>
<table cellpadding="2">
    <tr>
        <td nowrap="nowrap">Product name: 
        </td>
        <td>
            <input type="text" name="name" size="27">
        </td>
    </tr>
    <tr>
        <td >Price:
        </td>
        <td>
            <input type="text" name="price" size="27 ">
        </td>
    </tr>
    <tr>
        <td>Description:
        </td>
        <td>
            <textarea cols="25" rows="3" name="description" ></textarea>
        </td>
    </tr>
     <tr>
        <td>Quatity:
        </td>
        <td>
            <input type="text" name="quantity" size="27">
        </td>
    </tr>
    <tr>
        <td>Promotion :
        </td>
        <td>
            <input type="checkbox" size="27" name="promotion" value="1">
        </td>
    </tr>
    <tr>
        <td>Category :
        </td>
        <td>
            <select name="category_id">
                <option value="" selected="selected" >Please select</option>
                    <?php
                        $categories=get_categories();
                        foreach($categories as $key=>$value)
                        {
                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option> ';
                        }
                    ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Add picture:
        </td>
        <td>
            <input type="file" name="file" id="file" /> 
        </td>
    </tr>
    <tr>
        <td>
        </td>
        <td>
           <input type="submit"  value="Add" >
        </td>
    </tr>
</table>

<input type="hidden" name="action" value="add_products">
</form>

  <?php
    include('footer.php');
?> 