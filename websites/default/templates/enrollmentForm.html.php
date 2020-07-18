<?php  
?>

<h3> <?php echo $student['Fname']?> </h3>
<form action="" method="post">
        <input type="hidden" name="student[student_id]" value="<?=$student['student_id'] ?? ''?>" />    
		<label for="student[course]">Courses</label>
		<select name="student[course_id]">
        <?php 
        foreach ($courses as $course ) {
            if($student['course_id']!=$course['course_id']){
                echo'<option value="'.$course['course_id'].'" >'.$course['name'].'</option>';
            }
            if($student['course_id']==$course['course_id']){
            echo'<option value="'.$course['course_id'].'" selected class="font-weight-bold">'.$course['name'].' (Enrolled On)</option>';
            }
        
        }
      
        ?>
        </select>

		<input type="submit" value="Enrol">
</form>
