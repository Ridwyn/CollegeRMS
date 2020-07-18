<?php
?>
<form action="" method="post">
		<input type="hidden" name="staff[staff_id]" value="<?=$staff['staff_id'] ?? ''?>" />
		<label for="staff[Fname]">First Name</label>
        <input type="text" name="staff[Fname]" value="<?=$staff['Fname'] ?? ''?>" />
		</br>
		<label for="staff[Sname]">Last Name</label>
        <input type="text" name="staff[Sname]" value="<?=$staff['Sname'] ?? ''?>" />
		</br>
		<label for="staff[email]">Email</label>
        <input type="text" name="staff[email]" value="<?=$staff['email'] ?? ''?>" />
		</br>
		<label for="staff[contact_no]">Contact Number</label>
		<input type="number" name="staff[contact_no]" value="<?=$staff['contact_no'] ?? ''?>" />
		</br>
		<label for="staff[postcode]">Postcode</label>
		<input type="text" name="staff[postcode]" value="<?=$staff['postcode'] ?? ''?>" />
		</br>
		<label for="staff[street]">Street</label>
		<input type="text" name="staff[street]" value="<?=$staff['street'] ?? ''?>" />
		</br>
		<label for="staff[city]">City</label>
		<input type="text" name="staff[city]" value="<?=$staff['city'] ?? ''?>" />
		</br>
		<label for="staff[dob]">Date of Birth</label>
		<input type="date" id="dob"  name="staff[dob]"
		value="<?=$staff['dob'] ?? ''?>">
		</br>
		<label for="staff[start_date]">Start Date</label>
		<input type="date" id="staff[start_date]"  name="staff[start_date]"
		value="<?=$staff['start_date'] ?? ''?>">
		</br>

		<label for="staff[stafftype]">Staff Type</label>
		<select name="staff[stafftype]">
			<option value="admin" >Admin </option>
			<option value="teacher">Teacher </option>
            </select>

	
		</br>
		<label for="">Gender</label>
			<!-- <?php   
				// $selectm='';
				// $selectf='';
				// if ($staff['gender']=='male') {
				// 	$selectm='select';
				// }
				// if ($staff['gender']=='female') {
				// 	$selectf='select';
				// }
				// if ($staff['gender']=='') {
				// 	$selectm='';
				// 	$selectf='';
				// }
			?> -->
            <select name="staff[gender]">
			<option value="male" >Male </option>
			<option value="female">Female </option>
            </select>
		<br />
		<label for="">Salary</label>
		<input type="number" i  name="staff[salary]"	value="<?=$staff['salary'] ?? ''?>">	
		</br>

		<input type="submit" value="Add">
</form>