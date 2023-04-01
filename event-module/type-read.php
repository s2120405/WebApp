<!--Displaying the current event type page--->

<div id="proList">
<table id="tableP">
<a href="index.php?page=event&subpage=addt"> Add Event Type <i></a></i>
<tr>
<th> No.  </th><th>Product Type Name  </th> <th> Description  </th>  <th>Modify</th>
</tr>

<?php
 $count = 1;
 $count = 1;
if($events->list_event_type() != false){
foreach($events->list_event_type() as $value){
   extract($value);
  
?>
      <tr>
      <td><?php echo $count;?></td>
      <td><a href="index.php?page=event&subpage=editt&id=<?php echo $type_id;?>"><?php echo $type_name;?></a></td>
        <td><?php echo $type_desc;?></td>
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
