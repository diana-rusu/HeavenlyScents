
<?php
include('header.php');
?>
<table>
   
<?php
$categories=get_categories();
foreach($categories as $key=>$value)
{
    echo ' <tr><td width="400">'. $value['name'].'</td><td>  <a href="../core/action_handler.php?action=delete_category&category_id='.$value['id'].'">Delete</a></td><td>&nbsp&nbsp&nbsp
    <a href="../admin/edit_category.php?category_id='.$value['id'].'">Edit</a></td></tr>';
}
?>
</table>
<form action="../core/action_handler.php" method="post">
<br />
<br />
<a style="color: red;font: monospace; font-size: 25px;">Add new category: </a>
<input type="text" name="category" size="29">
&nbsp&nbsp
<input type="submit" value="Add">
<input type="hidden" name="action" value="add_category">
</form>

<?php
    include('footer.php');
?>
