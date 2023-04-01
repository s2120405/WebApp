<!--Displaying the event creation page--->

<form method="post" name="form1" action="processes/process.event.php?action=new">
		<table width="100%">
			<tr>
				<td>Venue</td>
				<td><input type="text" name="Venue"></td>
			</tr>
			<tr>
				<td>Event Start</td>
				<td><input type="time" name="Event_start"></td>
			</tr>
			<tr>
				<td>Event End</td>
				<td><input type="time" name="Event_end"></td>
			</tr>
            <tr>
				<td>Event Date</td>
				<td><input type="date" name="Event_date"></td>
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
		<div id="edit-wrapper">
		<input id="prodSubmit" type="submit" name="Submit">
</div>
	</form1>


