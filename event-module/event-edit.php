<!--Displaying the event update page--->
<form method="post" name="form1" action="processes/process.event.php?action=update">
		<table width="100%">
			<tr>
				<td>Venue</td>
				<td><input type="text" name="Venue"  value="<?php echo $events->get_Venue($id);?>"></td>
			</tr>
			<tr>
				<td>Event Start</td>
				<td><input type="time" name="Event_start" value="<?php echo $events->get_Event_start($id);?>"></td>
			</tr>
			<tr>
				<td>Event End</td>
				<td><input type="time" name="Event_end" value="<?php echo $events->get_Event_end($id);?>"></td>
			</tr>
            <tr>
				<td>Event Date</td>
				<td><input type="date" name="Event_date" value="<?php echo $events->get_Event_date($id);?>"></td>
			</tr>
			<tr>
			<label for="ptype">Type</label>
            <select id="ptype" name="ptype">
              <?php
              if($events->list_event_type() != false){
                foreach($events->list_event_type() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $type_id;?>"><?php echo $type_name;?></option>
              <?php
                }
              }
              ?>
        </select>
			</tr>
		
		</table>
		<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input id="prodSubmit2" type="submit" name="update" value="Update"></td>
</div>
	</form1>


