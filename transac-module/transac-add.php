<!--Displaying the transaction creation page--->

<form method="post" name="form1" action="processes/process.transac.php?action=new">
		<table width="100%">
		     <tr>
				<td>Customer Name</td>
				<td><input type="text" name="cust_name"></td>
			</tr>
			<tr>
				<td>Customer Contact No.</td>
				<td><input type="text" name="cust_no"></td>
			</tr>
			<tr>
				<td>Quantity Ordered</td>
				<td><input type="number" name="cust_qty"></td>
			</tr>
			<tr>
			<label for="item_name">Type</label>
            <select id="item_name" name="item_name">
              <?php
              if($transacs->list_rental() != false){
                foreach($transacs->list_rental() as $value){
                   extract($value);
              ?>
              <option value="<?php echo $rental_id;?>"><?php echo $item_name;?></option>
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


