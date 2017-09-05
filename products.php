
 <?php
    include('header.php');
?>


<?php
    $category_id=$_GET['category_id'];
    $products=get_products($category_id);
    $i=1;
?>
    <table>
        <tr>
<?php
    
    foreach($products as $value)
    {
        if($i%6==0)
        {
            echo '</tr><tr>';
        }
        if($value['picture']=='')
            $value['picture']='no_pic.jpg';
        echo '<td align="center"><a href="product.php?product_id='.$value['id'].'"><img src="admin/upload/'.$value['picture'].'" height="100" weight="100"> <br />'.$value['name'].'</a></td>';
        $i++;
    }
?>
        </tr>
    </table>
       
 
 <?php
    include('footer.php');
?>