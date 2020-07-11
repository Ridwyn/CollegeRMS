<?php
?>
<form action="" method="post">
		<input type="hidden" name="teacher[teacher_id]" value="<?=$teacher['teacher_id'] ?? ''?>" />
		<label for="student">First Name</label>
        <input type="text" name="teacher[Fname]" value="<?=$teacher['Fname'] ?? ''?>" />
		<label for="student">Last Name</label>
        <input type="text" name="teacher[Sname]" value="<?=$teacher['Sname'] ?? ''?>" />
		<label for="student">Username</label>
        <input type="text" name="teacher[username]" value="<?=$teacher['username'] ?? ''?>" />
		<label for="student">Password</label>
        <input type="password" name="teacher[password]" value="<?=$teacher['password'] ?? ''?>" />
		<label for="student">email</label>
        <input type="text" name="teacher[email]" value="<?=$teacher['email'] ?? ''?>" />

		<label for="student">Date of Birth</label>
		<input type="date" id="start"  name="teacher[dob]"
		value="<?=$teacher['dob'] ?? ''?>">
	
		</br>
		<label for="">Gender</label>
			<?php   
				$selectm='';
				$selectf='';
				if ($teacher['gender']=='male') {
					$selectm='select';
				}
				if ($teacher['gender']=='female') {
					$selectf='select';
				}
				if ($teacher['gender']=='') {
					$selectm='';
					$selectf='';
				}
			?>
            <select name="teacher[gender]">
			<option value="male" <?=$selectm?>>Male </option>
			<option value="female" <?=$selectf?>>Female </option>
            </select>
		<br />
		<label for="">Address</label>
		<input type="text" i  name="teacher[address]"	value="<?=$teacher['address'] ?? ''?>">	
		</br>
		<label for="">Salary</label>
		<input type="number" i  name="teacher[salary]"	value="<?=$teacher['salary'] ?? ''?>">	
		</br>

		<input type="submit" value="Add">
</form>