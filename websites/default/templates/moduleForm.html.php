<form action="" method="post" >
		<div class="col-6">
		<input type="hidden" name="module[module_id]" value="<?=$module['module_id'] ?? ''?>" />
		<input type="hidden" name="module[course_id]" value="<?=$_GET['course_id'] ?? $module['course_id']?>" />
		<label for="name">Module Name</label>
        <input type="text" name="module[name]" value="<?=$module['name'] ?? ''?>" />
		</br>
		<label for="name">Leader</label>
		<select name="module[staff_id]" >
			<?php
                foreach ($staffs as $staff ) {
                    if($module['staff_id']!=$staff['staff_id']){
                        echo'<option value="'.$staff['staff_id'].'" >'.$staff['Fname'].'</option>';
                    }
                    if($module['staff_id']==$staff['staff_id']){
                    echo'<option value="'.$staff['staff_id'].'" selected class="font-weight-bold">'.$staff['Fname'].' (Current Leader)</option>';
                    }
                }
			?>
		</select>
		</br>
		</div>
		<input type="submit" value="Submit">
</form>