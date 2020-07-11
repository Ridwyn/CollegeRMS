

<div class="row text-center justify-content-center">
          <div class="col-4 p-3 tab">My Reservations</div>
          <div class="col-4 p-3 tab">Book Classroom</div>
        </div>
        <table class="table table-hover my-3">
          <thead>
            <tr>
              <th scope="col">Building</th>
              <th scope="col">Room Number</th>
              <th scope="col">Start-Date</th>
              <th scope="col">End-Date</th>
              <th scope="col">Start-Time</th>
              <th scope="col">End-Time</th>
            </tr>
          </thead>
          <tbody>            
                <?php
                    foreach ($reservations as $reservation) {
                        list($startdate, $starttime)=explode(" ",$reservation['start_date']);
                        list($enddate, $endtime)=explode(" ",$reservation['end_date']);
                    echo'
                    <tr>
                    <th scope="row">'.$reservation['location'].'</th>
                    <td>'.$reservation['room_number'].'</td>
                    <td>'.$startdate.'</td>
                    <td>'.$enddate.'</td>
                    <td>'.$starttime.'</td>
                    <td>'.$endtime.'</td>
                    </tr>
                    ';
                    }
                ?>
          </tbody>
        </table>
</div>