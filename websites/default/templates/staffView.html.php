
<div class="row my-4 px-5">
          <div class="col-8">
            <h3>Staff Name</h3>
            <h5><?= $staff['Fname'] ?? ''?></h5>
            <h3>Date of Birth</h3>
            <h5><?= $staff['dob'] ?? ''?></h5>
            <h3>Employed On</h3>
            <h5><?= $staff['start_date'] ?? ''?></h5>
            <h3>Modules</h3>
            <h5>Maths</h5>
            <h5>Biology</h5>
            <h5>Physics</h5>
          </div>
          <div class="col-4">
            <img class="Myphoto img-fluid" src="/images/default.png" alt="My Photo">
          </div>
</div>


<ul class="row permissions w-100 justify-content-center my-2">
<li class="col"> <a href="/staff/edit?id=<?=$_GET['id']?> & staff=<?=$_GET['staff']?>">Amend</a></li>
<li class="col"> <a href="/staff/archive?id=<?=$_GET['id']?> & staff=<?=$_GET['staff']?>">Archive</a><Archive</li>
<li class="col"><a href="/staff/delete?id=<?=$_GET['id']?> & staff=<?=$_GET['staff']?>">Delete</a></li>
<li class="col">Assign</li>
</ul>

<!-- <?php require 'permission.html.php';	?> -->