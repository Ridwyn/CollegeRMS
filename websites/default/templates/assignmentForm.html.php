<form action="" method="post">
	<input type="hidden" name="assignment[assignment_id]" value="<?=$assignment['assignment_id'] ?? ''?>" />
	<label for="assignment[assignment_name]">Assignment Title:</label>
    <input type="text" name="assignment[assignment_name]" value="<?=$assignment['assignment_name'] ?? ''?>" />
	</br>
    <textarea id = "assignment_description" name="assignment[assignment_description]"  rows="4" cols="50"> <?=$assignment['assignment_description'] ?? ''?>
    </textarea>
	</br>
    <input type="hidden" name="assignment[staff_id]" value="<?=$teacher['staff_id'] . ' ' ?? ''?>" />
	</br>
	<label for="assignment[deadline]">Deadline</label>
	<input type="date" name="assignment[deadline]" value="<?=$assignment['deadline'] ?? ''?>">
	<select name="assignment[module_name]" >
			<?php
                foreach ($modules as $module) {
                    echo'<option value="'.$module['name'].'">'.$module['name'].'</option>';
                    }
                
			?>
		</select>
		
	<input type="submit" value="Post">
</form>