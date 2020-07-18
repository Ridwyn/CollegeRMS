<div class="row my-4 px-5">
          <div class="col-8">
            <h3>Student Name</h3>
            <h5><?= $student['Fname'] ?? ''?></h5>
            <h3>Date of Birth</h3>
            <h5><?= $student['DOB'] ?? ''?></h5>
            <h3>Username</h3>
            <h5><?= $student['username'] ?? ''?></h5>
            <h3>Start Date</h3>
            <h5><?= $student['start_date'] ?? ''?></h5>
          </div>
          <div class="col-4">
            <img class="Myphoto img-fluid" src="/images/default.png" alt="My Photo">
          </div>
</div>