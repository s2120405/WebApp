<!--Displaying the event type creation page--->
<form method="post" name="form1" action="processes/process.event.php?action=newtype">
		<table width="100%">
			<tr>
				<td>Event Type</td>
				<td><input type="text" name="type_name"></td>
			</tr>
			<tr>
            <td><label for="name">Description</label></td>
            <td> <textarea id="desc" class="input" name="type_desc" placeholder="Description.."></textarea></td>
			</tr>
		
		</table>
		<div id="edit-wrapper">
		<input id="prodSubmit" type="submit" name="Submit">
</div>
	</form1>