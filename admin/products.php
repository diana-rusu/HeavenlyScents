
<?php
    include('header.php');
?>
<table>
<?php
$products=get_products();
foreach($products as $key=>$value)
{
    echo '<tr><td width="400">'.$value['name'].'</td><td> <a href="../core/action_handler.php?action=delete_product&product_id='.$value['id'].'">Delete</a>&nbsp&nbsp&nbsp 
    <a href="../admin/edit_product.php?product_id='.$value['id'].'">Edit</a></td></tr>';
}
?>
</table>
<form action="../core/action_handler.php" method="post">
<br />
<br />
<a href="add_products.php" style="font-size: 25px;color: red;">Add new product</a>
<br />
</form>
 <?php
    include('footer.php');
?>
