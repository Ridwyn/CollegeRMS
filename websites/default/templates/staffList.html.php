<ul class="list-group">
  <h4 class="list-group-item text-center">Staffs List</h4>
  

  <h5 class=""> 
    <a href="/staff/edit" class="float-left badge badge-secondary badge-pill p-2 m-2">+Add Staff </a>
  
  </h5>
  <?php
    foreach($staffs as $staff){
        echo '<li class="list-group-item">
                <a href="/staff?id= '.$staff['staff_id'].'">'.$staff["Fname"].'</a>
            </li>';
       
    }
 ?>
</ul>


