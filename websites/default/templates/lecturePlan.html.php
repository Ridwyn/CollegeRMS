<div>
<h3>Lecture plan for:<i><u> <?= $course['name']?></u></i>

 </h3>
 <h6 class="badge-info text-center">Click on a module to set a new plan</h6>



<div class="row">
    <div class="col-12 row">
    
        <?php
        foreach ($modules as $key => $module) {
            echo '<div class="col-4 text-center ">
                    <a href="/lecture/plan/edit?module_id='.$module['module_id'].'" class=" btn nav-item yrsBtn m-1 ">
                    '.$module['name'].'                    
                    </a>
                    </div>';
        }

        ?>
    </div>

    <div class="col-12">
        <?php
            if (count($lecturesPlan) != 0) {
            echo  '<h4 >Scheduled Lectures</h4>
                <table class="table col-6">
                    <thead>
                        <tr>
                        <th scope="col">Start Time</th>
                        <th scope="col">End Time</th>
                        <th scope="col">Lecture</th>
                        <th scope="col">Tutor</th>
                        <th scope="col">Room</th>
                        <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody>';

                            foreach ($lecturesPlan as $key=> $lecture) {
                                    echo '<tr>
                                            <td>'.date_format(date_create($lecture['start_date']),"Y/M/D H:i:s").'</td>
                                            <td>'.date_format(date_create($lecture['end_date']),"Y/M/D H:i:s").'</td>
                                            <td> '.$lecture['module_name'].' </td>
                                            <td>'.$lecture['staff_name'].'</td>
                                            <td>'.$lecture['room_number'].'</td>
                                            <td><a href="/lecture/plan/edit?id='.$lecture['lecture_id'].'&module_id='.$lecture['module_id'].'" class="badge badge-dark p-2">Edit</a></td>
                                        </tr>';
                            };
                            
                                
                echo   '  </tbody>
                </table>';
                


            }
        ?>
    
       
     </div>


        </div>
            <!-- <div class=" nav nav-tabs nav-fill flex-column flex-sm-row nav-justified" >
                <?php
                    $currentDate=date('Y');
                    for ($i=0; $i < 4; $i++) { 
                        $j=$i+1;
                        echo '<button id="'.date('Y', strtotime('+'.$i.' years')).'" onclick=getMonths() class=" btn nav-item nav-link  yrsBtn m-1 ">
                        '.date('Y', strtotime('+'.$i.' years')).'-'.date('Y', strtotime('+'.$j.' years')).'
                        </button>';
                        ;
                    }        
                ?>
            </div>
            <ul id="monthsDisplay" class="nav nav-tabs flex-column flex-sm-row my-2"></ul>
            -->

 

</div>
<!-- 
<script >

    function getMonths(){
        let li='';
        document.querySelectorAll('.yrsBtn').forEach(btn => {
            btn.addEventListener('click', function() {       
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            for (let i = 1; i < 11; i++) {
                var startDate=new Date(this.id, 07+i);
                li+=`<button class="btn flex-sm-fill text-sm-center nav-link m-1">${startDate.toLocaleDateString('en-GB',options).split(" ").slice(2,4)}</button>`
            }
            monthsDisplay.innerHTML=li;
                })
        });
 

    }

</script> -->