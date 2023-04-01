<!--Displaying the rental edit page--->

<div id="edit-wrapper">
<form name="update_user" id="proSubmit" method="post"  action="processes/process.rental.php?action=update">
            <tr>
				<td>Item Name</td>
				<td><input type="text" name="Item_name" value="<?php echo $rentals->get_Rental_name($id);?>"> </td>
			</tr>
			<tr>
				<td>Item Indiv Price</td>
				<td><input type="text" name="rent_price" value="<?php echo $rentals->get_price($id);?>"></td>
			</tr>
			<tr>
				<td>Pickup Date</td>
				<td><input type="text" name="item_qty" value="<?php echo $rentals->get_item_qty($id);?>"></td>
			</tr>
		
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input id="prodSubmit2" type="submit" name="update" value="Update"></td>
			</tr>
			</form>
</div>

