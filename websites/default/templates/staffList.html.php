<ul class="list-group">
  <h4 class="list-group-item text-center">Staffs List</h4>
  

  <h5 class=""> 
    <a href="/staff/edit?staff=admin" class="float-left badge badge-secondary badge-pill p-2 m-2">+Add Admin </a>
    <a href="/staff/edit?staff=teacher" class="float-right badge badge-primary badge-pill p-2 m-2">+Add Teacher </a> 
  </h5>
  <?php
    foreach($staffs['teachers'] as $staff){
        echo '<li class="list-group-item">
                <a href="/staff?id='.$staff['teacher_id'].'&staff=teacher">'.$staff["Fname"].'</a>
            </li>';
       
    }
    foreach($staffs['admins'] as $staff){
        echo '<li class="list-group-item">
                <a href="/staff?id='.$staff['admin_id'].'&staff=admin">'.$staff["Fname"].'</a>
            </li>';
       
    }
 ?>
</ul>


