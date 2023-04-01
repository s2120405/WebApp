<!--Displaying the current rental page--->

<div id="proList">
<table id="tableP">
<a href="index.php?page=rentals&subpage=add"> Add Rental Item<i></a></i>
<tr>
<th>Rental ID  </th><th>Name  </th> <th> Individual Item Price  </th> <th>Quantity  </th> <th>Modify</th>
</tr>

<?php
$count = 1;
$count = 1;

if($rentals->list_rental() != false){
foreach($rentals->list_rental() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $rental_id;?></td>
        <td><?php echo $item_name;?></td>
        <td><?php echo $rent_price;?> PHP </td>
        <td><?php echo $item_qty;?></td>
        <td><a href="index.php?page=rentals&subpage=edit&id=<?php echo $rental_id;?>"> Edit</a></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>


</table>

</div>