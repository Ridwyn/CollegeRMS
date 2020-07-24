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
                echo '<tr>
                        <td> '.$lecture['module_name'].' </td>
                        <td>'.date_format(date_create($lecture['start_date']),"Y/M/D H:i:s").'</td>
                        <td>'.date_format(date_create($lecture['end_date']),"Y/M/D H:i:s").'</td>
                        <td>'.$lecture['room_number'].'</td>
                        <td><a href="/register/lecture?id='.$lecture['lecture_id'].'" class="btn btn-secondary">Mark &#10004;</a></td>
                    </tr>';
            };
        ?>
                                
    </tbody>
</table>



</div>