<!--Displaying the transactions update page--->

<div id="edit-wrapper">
<form name="update_user" id="proSubmit" method="post"  action="processes/process.transac.php?action=update">
            <tr>
				<td>Customer Name</td>
				<td><input type="text" name="cust_name" value="<?php echo $transacs->get_Transac_cust($id);?>"> </td>
			</tr>
			<tr>
				<td>Customer Contact No.</td>
				<td><input type="text" name="cust_no" value="<?php echo $transacs->get_custno($id);?>"></td>
			</tr>
			<tr>
				<td>Quantity Ordered</td>
				<td><input type="number" name="cust_qty" value="<?php echo $transacs->get_cust_qty($id);?>"></td>
			</tr>
			<tr>
			<label for="itemname">Type</label>
            <select id="itemname" name="itemname">
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
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
				<td><input id="prodSubmit2" type="submit" name="update" value="Update"></td>
			</tr>
			</form>
</div>

