<div>

<table class="table col-6">
    <thead>
        <tr>
        <th scope="col">Lecture</th>
        <th scope="col">Start Time</th>
        <th scope="col">End Time</th>
        <th scope="col">Room</th>
        <?php
          echo (isset($lecturesTimetable[0]['staff_name'])) ? '<th scope="col">Tutor</th>':'';  
        ?>
        </tr>
    </thead>
    <tbody>
        <?php

            foreach ($lecturesTimetable as $key=> $lecture) {
                $staffname='';
                if(isset($lecture['staff_name'])){
                    $staffname='<td>'.$lecture['staff_name'].'</td>';
                };
                echo '<tr>
                        <td> '.$lecture['module_name'].' </td>
                        <td>'.date_format(date_create($lecture['start_date']),"Y/M/D H:i:s").'</td>
                        <td>'.date_format(date_create($lecture['end_date']),"Y/M/D H:i:s").'</td>
                        <td>'.$lecture['room_number'].'</td>
                        '.$staffname.'
                    </tr>';
            };
        ?>
                                
    </tbody>
</table>


</div>