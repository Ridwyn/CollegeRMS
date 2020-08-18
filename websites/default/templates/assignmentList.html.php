


<div class="col-12">
<h5>
  <a href="/assignment/edit" class="float-right badge badge-primary badge-pill p-2 m-2">+New Assignment</a> 
  </h5>
        <?php

        
            echo  '<h4 >Assignments</h4>
                <table class="table col-6">
                    <thead>
                        <tr>
                        <th scope="col">Module</th>
                        <th scope="col">Assignment</th>
                        <th scope="col">Description</th>
                        <th scope="col">Deadline</th>
                        </tr>
                    </thead>
                    <tbody>';

                    
                            foreach ($assignments as $key=> $assignment) {
                                    echo '<tr>
                                            <td>'.$assignment['module_name'].'</td>
                                            <td>'.$assignment['assignment_name'].'</td>
                                            <td>'.$assignment['assignment_description'].'</td>
                                            <td>'.date_format(date_create($assignment['deadline']),"Y/M/D H:i:s").'</td>
                                            <td><a href="/assignment/edit?id='.$assignment['assignment_id'].'" class="badge badge-dark p-2">Edit</a></td>
                                            <td><a href="/grade/edit?id='.$assignment['assignment_id'].'" class="badge badge-dark p-2">Grade</a></td>
                                        </tr>';
                            };
                            
                                
                echo   '  </tbody>
                </table>';
                


            
        ?>
    
       
     </div>