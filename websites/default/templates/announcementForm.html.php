<form action="" method="post">
	<input type="hidden" name="announcement[announcement_id]" value="<?=$announcement['announcement_id'] ?? ''?>" />
	<label for="subject">Subject:</label>
    <input type="text" name="announcement[subject]" value="<?=$announcement['subject'] ?? ''?>" />
	</br>
    <textarea id = "body" name="announcement[body]"  rows="4" cols="50"> <?=$announcement['body'] ?? ''?>
    </textarea>
	</br>
    <input type="hidden" name="announcement[author]" value="<?=$teacher['Fname'] . ' ' . $teacher['Sname'] ?? ''?>" />
	</br>

		
	<input type="submit" value="Post">
</form>