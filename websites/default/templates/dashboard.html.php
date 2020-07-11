<script type="text/javascript">
window.onload = function() {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light1", // "light2", "dark1", "dark2"
    animationEnabled: false, // change to true
    title: {
      text: "Welcome User"
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