
<ul class="list-group">
    <?php
    echo '<h4>Search results for <b>"'.$searchterm.'"</b></h4>';
    if(count($results['courses'])+ count($results['teachers']) + count($results['admins']) + count($results['students'])==0 ){
        echo '<h5 class="font-weight-bolder text-center">No Results found</h5>';
    }
    

        if(count($results['teachers']) != 0){
            echo '<h5 class="list-group-item font-weight-bolder text-center"> Teachers   </h5>';
            foreach($results['teachers'] as $teacher){
                echo '<li class="list-group-item">
                        <a href="/staff?id='.$teacher['teacher_id'].'&staff=teacher">
                        <span>'.$teacher["Fname"].'</span>
                        <span>'.$teacher["Sname"].'</span>
                        </a>
                    </li>';
            
            }
        }  
        
        if(count($results['admins']) != 0){
            echo '<br><h5 class="list-group-item font-weight-bolder text-center"> Admins   </h5>';
            foreach($results['admins'] as $admin){
                echo '<li class="list-group-item">
                        <a href="/staff?id='.$admin['admin_id'].'&staff=admin">
                        <span>'.$admin["Fname"].'</span>
                        <span>'.$admin["Sname"].'</span>
                        </a>
                    </li>';
            
            }
        } 

        if(count($results['students']) != 0){
            echo '<br><h5 class="list-group-item font-weight-bolder text-center"> Students   </h5>';
            foreach($results['students'] as $student){
                echo '<li class="list-group-item">
                        <a href="/student?id='.$student['student_id'].'">
                        <span>'.$student["Fname"].'</span>
                        <span>'.$student["Sname"].'</span>
                        </a>
                    </li>';
            
            }
        }   
        if(count($results['courses']) != 0){
            echo '<br><h5 class="list-group-item font-weight-bolder text-center"> Course   </h5>';
            foreach($results['courses'] as $course){
                echo '<li class="list-group-item">
                        <a href="/course?id='.$course['course_id'].'">'.$course["name"].'</a>
                    </li>';
            
            }
        }   
    ?>
</ul>
