<div class=" row justify-content-center">
<h3>Lecture plan for:<i><u> <?= $module['name']?></u></i> </h3>

<!-- <?php

?> -->

<h4 class="badge badge-danger col-10 align-items-center"><?=$error??''?></h4>
            <form action="" class="my-4 col-10 row" method="post">
                <input
                type="hidden"
                name="lecture[lecture_id]"
                value="<?=$lecture['lecture_id'] ?? ''?>" 
                />
                <input
                type="hidden"
                name="lecture[module_id]"
                value="<?=$_GET['module_id'] ?? ''?>" 
                />
                <div class="col-6">
                    <label><b>Start Date:</b></label>
                    <input
                    type="datetime-local"
                    name="lecture[start_date]"
                    value=<?=str_replace(" ","T",$lecture['start_date'])??''?>
                    />
                </div>
                <div class="col-6 ">
                <label><b>End Date</b></label>
                    <input
                    type="datetime-local"
                    name="lecture[end_date]"
                    value=<?=str_replace(" ","T",$lecture['end_date'])??''?>
                    />
                </div>
                </br>
                <div class="col-6 my-4">
                   <label for=""><b>Building</b></label>
                    <select name="lecture[room_id]">
                    <?php foreach ($rooms as $room) {
                            if($lecture['room_id']!=$room['room_id']){
                                echo' 
                                <option value="'.$room['room_id'].'">
                                ('.$room['room_number'].') '.$room['location'].'</option>';
                            }
                            if($lecture['room_id']==$room['room_id']){
                            echo'<option value="'.$room['room_id'].'" selected class="font-weight-bold">('.$room['room_number'].') '.$room['location'].'   (Selected)</option>';
                            }
                        };
                    ?>
                    </select>
                </div>
                <div class="col-6 my-4">
                   <label for=""><b>Lecturer</b></label>
                    <select name="lecture[staff_id]">
                    <?php foreach ($staffs as $staff) {
                         if($lecture['staff_id']!=$staff['staff_id']){
                            echo' <option value="'.$staff['staff_id'].'">
                            '.$staff['Fname'].'- '.$staff['Sname'].'</option>';
                        }
                        if($lecture['staff_id']==$staff['staff_id']){
                        echo'<option value="'.$staff['staff_id'].'" class="font-weight-bold" selected>
                        '.$staff['Fname'].'- '.$staff['Sname'].'  (Selected)</option>';
                        }
                       
                        };
                    ?>
                    </select>
                </div>
                <br />
                <input type="submit" value="Set Plan" class="button my-3"/>
            </form>
    </div>