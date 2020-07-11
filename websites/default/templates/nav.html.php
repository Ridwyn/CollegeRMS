<?php

  
// require 'functions/pdo.php';
// $nav_item='';
// $results = $pdo->query('SELECT * FROM category ORDER BY date_created DESC');
// // // Form navbar
// foreach($results as $category){
//     $nav_item.='
//     <li class="nav-item">
//         <a class="nav-link" href="categorypage.php?c_id='.$category['category_id'].'&c_name='.$category['category_name'].'">
//         '.ucfirst($category['category_name']).'
//         </a>
//     </li>
//     ';
// }
// echo $nav_item;



echo '
<ul class="nav flex-column ">
            <li class="nav-item">
        <h4><a class="nav-link active" href="/dashboard">Dashboard</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="/staff/list">Staff Records</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="/course/list">Course Records</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="/student/list">Student Records</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="/bookclass/edit">BookClassroom</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="/checkreservation">Check Reservation</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="">Attendance Records</a></h4>
        </li><li class="nav-item">
        <h4><a class="nav-link " href="">Search Result</a></h4>
        </li>            
    </ul>

'

?>