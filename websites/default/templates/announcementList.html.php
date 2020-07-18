<ul class="list-group">
  <h4 class="list-group-item text-center">Announcements</h4>

  <?php if($_SESSION['usertype'] == 'teacher'){
    echo '
  <h5 class=""> 
    <a href="/announcement/edit" class="float-left badge badge-secondary badge-pill p-2 m-2">+Add Announcement </a>
  
  </h5>
  ';
  
  }
  ?>
  <?php
    foreach($announcements as $announcement){
        echo '<li class="list-group-item">
                <a href="/announcement?id= '.$announcement['announcement_id'].'">'.$announcement["subject"].'</a>
            </li>';
       
    }
 ?>
