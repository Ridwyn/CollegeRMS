
<div class="row my-4 px-5">
          <div class="col-8">
            <h3>First Name</h3>
            <h5><?= $student['Fname'] ?? ''?></h5>
            <h3>Middle Name</h3>
            <h5><?= $student['Mname'] ?? ''?></h5>
            <h3>Surname</h3>
            <h5><?= $student['Sname'] ?? ''?></h5>
            <h3>Postcode</h3>
            <h5><?= $student['postcode'] ?? ''?></h5>
            <h3>Street</h3>
            <h5><?= $student['street'] ?? ''?></h5>
            <h3>City</h3>
            <h5><?= $student['city'] ?? ''?></h5>
            <h3>Email Address</h3>
            <h5><?= $student['email'] ?? ''?></h5>
            <h3>Contact Number</h3>
            <h5><?= $student['contact_no'] ?? ''?></h5>
            <h3>Date of Birth</h3>
            <h5><?= $student['DOB'] ?? ''?></h5>
            <h3>Start Date</h3>
            <h5><?= $student['start_date'] ?? ''?></h5>
            <h3>Course</h3>
            <h5><?= $student['course'] ?? ''?></h5>
          </div>
          <div class="col-4">
            <img class="Myphoto img-fluid" src="/images/default.png" alt="My Photo">
          </div>
</div>

<?php require 'permission.html.php';	?>