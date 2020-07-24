<div>
<h3>Register for <?=$students_on_lecture[0]['module_name']?> on 
<span><?=date_format(date_create($students_on_lecture[0]['lecture_start_date']),"Y/M/D H:i:s")?></span>
</h3>
<table class="table col-6">
    <thead>
        <tr>
        <th scope="col">Student</th>
        <th scope="col">Mark Register</th>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach ($students_on_lecture as $key=> $sl) {
                echo '<tr>
                        <td> '.$sl['Fname'].'-'.$sl['Sname'].' </td>
                        <td>
                        <form action="" method="post">
                        <input type="hidden" name="resgister[student_id]" value="'.$sl['student_id'] .'" />
                        <input type="hidden" name="resgister[lecture_id]" value="'.$sl['lecture_id'] .'" />
                        <label for="student[Fname]">tick</label>
                        <input type="text" name="student[Fname]" value="" />
                        </br>
                        </form>
                        
                        </td>
                    </tr>';
            };
        ?>
                                
    </tbody>
</table>


</div>

<!--work on the submit form values for register -->