
<div class="row my-4 px-5">
          <div class="col-8">
            <h3>First Name</h3>
            <h5><?= $staff['Fname'] ?? ''?></h5>
            <h3>Middle Name</h3>
            <h5><?= $staff['Mname'] ?? ''?></h5>
            <h3>Surname</h3>
            <h5><?= $staff['Sname'] ?? ''?></h5>
            <h3>Date of Birth</h3>
            <h5><?= $staff['dob'] ?? ''?></h5>
            <h3>Gender</h3>
            <h5><?= $staff['gender'] ?? ''?></h5>
            <h3>Contact Number</h3>
            <h5><?= $staff['contact_no'] ?? ''?></h5>
            <h3>Employed On</h3>
            <h5><?= $staff['start_date'] ?? ''?></h5>
            <h3>Postcode</h3>
            <h5><?= $staff['postcode'] ?? ''?></h5>
            <h3>Street</h3>
            <h5><?= $staff['street'] ?? ''?></h5>
            <h3>City</h3>
            <h5><?= $staff['city'] ?? ''?></h5>
            <h3>Salary</h3>
            <h5><?= $staff['salary'] ?? ''?></h5>
            <h3>Staff Type</h3>
            <h5><?= $staff['stafftype'] ?? ''?></h5>
          </div>
          <div class="col-4">
            <img class="Myphoto img-fluid" src="/images/default.png" alt="My Photo">
          </div>
</div>


<!-- <ul class="row permissions w-100 justify-content-center my-2">
<li class="col"> <a href="/staff/edit?id=<?=$_GET['id']?>">Amend</a></li>
<li class="col">Archive</li>
<li class="col">Delete</li>
<li class="col">Assign</li>
</ul> -->

<?php require 'permission.html.php';	?>