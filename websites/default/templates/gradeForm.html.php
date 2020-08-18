<ul class="list-group">
  <h4 class="list-group-item text-center"><?php echo $assignment['assignment_name']?></h4>

  <form action="" method="post">
 
  <?php
var_dump($assignment);
    foreach($students as $student){
        ?>
        <input type="hidden" name="grade[student_id]" value="<?php $student['student_id']?>" />    
        <input type="hidden" name="grade[assignment_id]" value="<?php $GET['id']?>" />    

        <li class="list-group-item"><?php echo $student["Fname"]. $student["Lname"]?> </li>

       <select name="grade[grade]">';
       <option value='A+'> A+</option>
       <option value='A'>A</option>
       <option value='A-'>A-</option>
       <option value='B+'> B+</option>
       <option value='B'>B</option>
       <option value='B-'>B-</option>
       <option value='C+'>C+</option>
       <option value='C'>C</option>
       <option value='C-'>C-</option>
       <option value='D+'>D+</option>
       <option value='D'>D</option>
       <option value='D-'>D-</option>
       <option value='F'>F</option>
       <option value='G'>G</option>
       <option value='U'>U</option>
          
<?php
    }
 ?>
</ul>
</select>

<input type="submit" value="Grade">
</form>


<!-- <?php
        $studentFormInput='';


            foreach ($students_on_lecture as $key=> $sl) {
                $div='
                    <div class="mt-1  d-flex row justify-content-around">
                        <input type="hidden" name="resgister'.$key.'[student_id]" value="'.$sl['student_id'] .'" />
                        <input type="hidden" name="resgister'.$key.'[lecture_id]" value="'.$sl['lecture_id'] .'" />
                        <input type="hidden" name="resgister'.$key.'[module_id]" value="'.$sl['module_id'] .'" />
                        <label class="flex-fill ">'.$sl['Fname'].' '.$sl['Sname'].'</label>
                        <select class="flex-fill  " name="resgister'.$key.'[confirm]"">
                            <option value="yes" >Yes</option>
                            <option value="no" >No</option>
                        </select>
                    </div>
                    </br>
                ';
                $studentFormInput.=strval($div);
            }
            echo '
            <form action="" method="post" >
                '.$studentFormInput.'
                <input type="submit" class="mx-auto "  />
            </form>
            ';
        ?> -->