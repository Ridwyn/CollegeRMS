<div>
<h3>Attendance for <?= $register_Details[0]['module_name']?></h3>

<table class="table">
    <thead>
        <tr>
        <th scope="col">Student</th>
        </tr>
    </thead>
    <tbody>
        <?php
        

            foreach ($register_Details as $key=> $register) {
                // $present='<td><a href="/register/view?id='.$lecture['lecture_id'].'">View</a></td>';
                // if($register['is_present']!=true){
                //     $present=  '<td></td>';

                // }
                echo '<tr>
                        <td> '.$register['student_name'].' </td>
                    </tr>';
            };
        ?>
                                
    </tbody>
</table>

</div>