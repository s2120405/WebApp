<!--Displaying the event type update page--->
<form method="post" name="form1" action="processes/process.event.php?action=updatetype">
		<table width="100%">
			<tr>
				<td>Event Type</td>
				<td><input type="text" name="type_name" value="<?php echo $events->get_Event_type_name($id);?>"></td>
			</tr>
			<tr>
            <td><label for="name">Description</label></td>
            <td> <textarea id="desc" class="input" name="type_desc" value="<?php echo $events->get_Event_type_desc($id);?>" ></textarea></td>
			</tr>
		
		</table>
        <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input id="prodSubmit2" type="submit" name="update" value="Update"></td>
	</form1>