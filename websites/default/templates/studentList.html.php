<ul class="list-group">
  <h4 class="list-group-item text-center">Students List</h4>

  <h5>
  <a href="/student/edit" class="float-right badge badge-primary badge-pill p-2 m-2">+Add Student </a> 
  </h5>

  <?php

    foreach($students as $student){
       echo '<li class="list-group-item">
                <a href="/student?id='.$student['student_id'].'">'.$student["Fname"].'</a>
            </li>';
    }
 ?>
</ul>


