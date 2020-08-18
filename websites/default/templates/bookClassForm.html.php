
    <h5 class="">
          <!-- <div class="col-4 p-3 tab">My Reservations</div> -->
          <a href="/room/edit" class="float-right badge badge-primary badge-pill p-2 m-2">+Add Room </a> 
    </h5>

    <div class="text-center py-5">
        <h1>Book Classroom</h1>
        <p class="badge badge-warning"><?=$error ?? ''?></p>

        <form action="" class="my-4" method="post">
        <input
              type="hidden"
              name="reservation[reservation_id]"
              value="<?=$reservation['reservation_id'] ?? ''?>" 
            />
        <input
              type="hidden"
              name="reservation[username]"
              value="<?=$_SESSION['username'] ?? ''?>" 
            />
            <label><b>Start Date</b></label>
            <input
              type="datetime-local"
              name="reservation[start_date]"
            />
            <label><b>End Date</b></label>
            <input
              type="datetime-local"
              name="reservation[end_date]"
              
            />
            </br>
            <label for=""><b>Building</b></label>
            <select name="reservation[room_id]">
                <?php foreach ($rooms as $room) {
                   echo' <option value="'.$room['room_id'].'">
                   ('.$room['room_number'].') '.$room['location'].'</option>';
                };
                ?>
            </select
            ><br />
            <input type="submit" value="Book" class="button my-3"/>
        </form>
    </div>
