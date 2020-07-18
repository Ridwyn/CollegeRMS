<div class="row my-4 px-5">
          <div class="col-8">
            <h3><?=$announcement['subject'] ?? ''?></h3>
            <h5><?= $announcement['body'] ?? ''?></h5>
            <h5><?= $announcement['author'] ?? ''?></h5>
      
          </div>
</div>

<?php

if($_SESSION['usertype'] == 'teacher'){
    
    
    require 'permission.html.php';	
    
}    
    
    
    
    
?>
