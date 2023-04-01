<!--Displaying the current event page--->
<div id="proList">
<table id="tableP">
<a href="index.php?page=event&subpage=add"> Add Event <i> || </a>  </i>
<a href="index.php?page=event&subpage=readt"> Add Type <i></a></i>
<tr>
<th>Venue  </th> <th>Event Start  </th> <th>Event End  </th> <th>Event Date  </th> <th>Event Type </th> <th>Modify</th>
</tr>

<?php
if($events->list_events() != false){
foreach($events->list_events() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $Venue;?></td>
        <td><?php echo $Event_start;?></td>
        <td><?php echo $Event_end;?></td>
        <td><?php echo $Event_date;?></td>
        <td><?php echo $events->get_Event_type_name($events->get_Events_type($event_id));?></td>
        <td><a href="index.php?page=event&subpage=edit&id=<?php echo $event_id;?>"> Edit</a></td>
      </tr>
      <tr>
<?php

}
}else{
  echo "No Record Found.";
}
?>


</table>

</div>

