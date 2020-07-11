<ul class="list-group">
  <h4 class="list-group-item text-center">Course List</h4>

  <h5>
  <a href="/course/edit" class="float-right badge badge-primary badge-pill p-2 m-2">+Add Course </a> 
  </h5>
  <?php
    foreach($courses as $course){
      echo '             
              <li class="list-group-item">
                            <a href="/course?id='.$course['course_id'].'">'.$course["name"].'</a>
                        </li>';
      }
  ?>

</ul>




