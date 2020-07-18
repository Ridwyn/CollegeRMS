<form action="" method="post">
	<input type="hidden" name="student[student_id]" value="<?=$student['student_id'] ?? ''?>" />
	<label for="student[Fname]">Firstname</label>
    <input type="text" name="student[Fname]" value="<?=$student['Fname'] ?? ''?>" />
	</br>
	<label for="student[Mname]">Middlename</label>
    <input type="text" name="student[Mname]" value="<?=$student['Mname'] ?? ''?>" />
	</br>
	<label for="student[Sname]">Surname</label>
    <input type="text" name="student[Sname]" value="<?=$student['Sname'] ?? ''?>" />
	</br>
	<label for="student[DOB]">DOB</label>
	<input type="date" name="student[DOB]" value="<?=$student['DOB'] ?? ''?>">
	</br>
	<label for="student[start_date]">Start date</label>
	<input type="date" name="student[start_date]" value="<?=$student['start_date'] ?? ''?>">
	</br>
	<label for="student[est_grad_date]">Estimate gradudate date</label>
	<input type="date" name="student[est_grad_date]" value="<?=$student['est_grad_date'] ?? ''?>">
	</br>
	<label for="student[postcode]">Postcode</label>
    <input type="text" name="student[postcode]" value="<?=$student['postcode'] ?? ''?>" />
	</br>
	<label for="student[street]">Street</label>
    <input type="text" name="student[street]" value="<?=$student['street'] ?? ''?>" />
	</br>
	<label for="student[city]">City</label>
    <input type="text" name="student[city]" value="<?=$student['city'] ?? ''?>" />
	</br>
	<label for="student[contact_no]">Contact Number</label>
    <input type="number" name="student[contact_no]" value="<?=$student['contact_no'] ?? ''?>" />
	</br>
	<label for="student[email]">Email</label>
    <input type="text" name="student[email]" value="<?=$student['email'] ?? ''?>" />
	</br>
		
		
		
	<input type="submit" value="Add">
</form>