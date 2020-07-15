<form action="" method="post">
	<input type="hidden" name="student[student_id]" value="<?=$student['student_id'] ?? ''?>" />
	<label for="joketext">Student Firstname</label>
    <input type="text" name="student[Fname]" value="<?=$student['Fname'] ?? ''?>" />
	</br>
	<label for="joketext">Student Last</label>
    <input type="text" name="student[Sname]" value="<?=$student['Sname'] ?? ''?>" />
	</br>
	<label for="joketext">DOB</label>
	<input type="date" name="student[DOB]" value="<?=$student['DOB'] ?? ''?>">
	</br>
	<!-- <label for="joketext">username</label>
    <input type="text" name="student[username]" value="<?=$student['username'] ?? ''?>" />
	</br>
	<label for="joketext">password</label>
    <input type="password" name="student[password]" value="<?=$student['password'] ?? ''?>" /> -->
	</br>
	<label for="joketext">Start date</label>
	<input type="date" name="student[start_date]" value="<?=$student['start_date'] ?? ''?>">
	</br>
	<label for="joketext">Estimate gradudate date</label>
	<input type="date" name="student[est_grad_date]" value="<?=$student['est_grad_date'] ?? ''?>">
	</br>
	</br>
	<label for="joketext">address</label>
    <input type="text" name="student[address]" value="<?=$student['address'] ?? ''?>" />
	</br>
	<label for="joketext">Telephone</label>
    <input type="number" name="student[contact_no]" value="<?=$student['contact_no'] ?? ''?>" />
	</br>
		
		
	<input type="submit" value="Add">
</form>