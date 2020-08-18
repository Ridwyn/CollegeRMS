<section>

<p>
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Reset Password
  </button>
</p>
<div class="collapse" id="collapseExample">
  <form action="/password/reset" method="POST">
        <input type="hidden" name="username" value="<?=$_SESSION['username'] ?? ''?>" />
        <input type="hidden" name="user_type" value="<?php echo explode('-',$_SESSION['username'])[1]?>" />
        <label for="">Enter New Password</label><br>      
        <input type="password" name="password"  />
        <span class="text-secondary">suggested : <?= $passwordSuggestion ?? ''?></span>
        <br>
        <br>
        
        <input type="submit" value="reset" >

    </form>
</div>

<span class="text-success"><?= $_GET['success']??''?></span>
</section>
<script type="text/javascript">
window.onload = function() {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light1", // "light2", "dark1", "dark2"
    animationEnabled: false, // change to true
    title: {
      text: 'Welcome <?= $_SESSION['username']?? ''?> '
    },
    data: [
      {
        // Change type to "bar", "area", "spline", "pie", "column"etc.
        type: "bar",
        dataPoints: [
          { label: "Courses Offer", y: <?=count($courses)?> },
          // { label: "Staff Onsite", y: 25 },
          { label: "Students Enrolled", y: <?=count($students)?> },
          // { label: "Reserved Classrooms", y: 15 },
          { label: "All Classrooms", y: <?=count($rooms)?> }
        ]
      }
    ]
  });
  chart.render();
};
</script>

<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>