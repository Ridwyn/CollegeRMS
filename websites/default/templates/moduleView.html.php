<div class="mb-auto">
    <h5>Module Name</h5>
    <p><?=$module['name']??''?></p>
    
    <h5>Module Course</h5>
    <p><?=$course['name']??''?></p>
    
    <h5>Module Tutor</h5>
    <p>
        <?=$staff['Fname'] ??''?>
        <span></span>
        <?=$staff['Sname'] ??''?>
    </p>
    
</div>

<?php require 'permission.html.php';	?>