
<?php

  include('header.php'); 
?>
<?php
        $category_id=$_GET['category_id'];
        $category=get_category($category_id);
?>
<form action="../core/action_handler.php" method="post" enctype="multipart/form-data">
<p style="font-size: 30px;color: red;" align="center"> Edit category</p> 

Category name:
<input type="text" name="name" value="<?php echo $category['name']?>" >
<br />
<br />
<input type="submit" align="right" value="Edit">
<input type="hidden" name="action" value="edit_category">
<input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
</form>
<?php
     include('footer.php'); 
?>