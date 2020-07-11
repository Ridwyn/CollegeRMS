<?php
?>
<form action="" method="post">
		<input type="hidden" name="admin[admin_id]" value="<?=$admin['admin_id'] ?? ''?>" />
		<label for="student">First Name</label>
        <input type="text" name="admin[Fname]" value="<?=$admin['Fname'] ?? ''?>" />
		<label for="student">Last Name</label>
        <input type="text" name="admin[Sname]" value="<?=$admin['Sname'] ?? ''?>" />
		<label for="student">Username</label>
        <input type="text" name="admin[username]" value="<?=$admin['username'] ?? ''?>" />
		<label for="student">Password</label>
        <input type="password" name="admin[password]" value="<?=$admin['password'] ?? ''?>" />
		<input type="submit" value="Add">
</form>