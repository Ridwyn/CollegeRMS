<div>


<table class="table col-6">
    <thead>
        <tr>
        <th scope="col">Lecture</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Room</th>
        <th scope="col">Mark Register</th>
        </tr>
    </thead>
    <tbody>
        <?php
        

            foreach ($lecturesTimetable as $key=> $lecture) {
                $markRegisterLink='<td><a href="/register/view?id='.$lecture['lecture_id'].'">View</a></td>';
                if($lecture['is_marked']!=true){
                    $markRegisterLink=  '<td><a href="/register/lecture/edit?id='.$lecture['lecture_id'].'" class="btn btn-secondary">Mark &#10004;</a></td>';

                }
                echo '<tr>
                        <td> '.$lecture['module_name'].' </td>
                        <td>'.date_format(date_create($lecture['start_date']),"Y/M/D H:i:s").'</td>
                        <td>'.date_format(date_create($lecture['end_date']),"Y/M/D H:i:s").'</td>
                        <td>'.$lecture['room_number'].'</td>
                        '.$markRegisterLink.'
                    </tr>';
            };
        ?>
                                
    </tbody>
</table>



</div>