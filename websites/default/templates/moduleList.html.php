<ul class="list-group">
  <h4 class="list-group-item text-center">Module List</h4>

  <?php
    foreach($modules as $module){
       echo '<li class="list-group-item">
                <a href="/student/list?id='.$module['course_id'].'">'.$module["name"].'</a>
            </li>';
    }
 ?>
</ul>

