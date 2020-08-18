<?php

  
if(isset($_SESSION['usertype'])){

        if($_SESSION['usertype'] == 'admin'){
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
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/checkreservation">Check Reservation</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="">Attendance Records</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="">Search Result</a></h4>
                </li>            
            </ul>

        ';
        }

        else if($_SESSION['usertype'] == 'teacher'){
            echo '
            <ul class="nav flex-column ">
                        <li class="nav-item">
                    <h4><a class="nav-link active" href="/dashboard">Dashboard</a></h4>
                    </li><li class="nav-item">
                    <h4><a class="nav-link " href="/announcement/list">Announcements</a></h4>
                    </li><li class="nav-item">
                    <h4><a class="nav-link " href="/module/list">Modules</a></h4>
                    </li><li class="nav-item">
                    <h4><a class="nav-link " href="/assignment/list">Assignments</a></h4>
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
            
            ';
            }



        //student portal nav
        else if ($_SESSION['usertype'] == 'student'){

        echo '
                <ul class="nav flex-column ">
                    <li class="nav-item">
                <h4><a class="nav-link active" href="/announcement/list">Announcements</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/student?id='.$_SESSION['id'].'">Profile</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/module/list">Modules</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/timetable">Timetable</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/dairy">Dairy</a></h4>
                </li><li class="nav-item">
                <h4><a class="nav-link " href="/attendance">Attendance</a></h4>
                </li>            
            </ul>
        ';
        }
    }
else
{


// possible nav for university website
//     echo '
//     <ul class="nav flex-column ">
//                 <li class="nav-item">
//             <h4><a class="nav-link active" href="/dashboard">Dashboard</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="/staff/list">Staff Records</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="/course/list">Course Records</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="/student/list">Student Records</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="/bookclass/edit">BookClassroom</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="/checkreservation">Check Reservation</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="">Attendance Records</a></h4>
//             </li><li class="nav-item">
//             <h4><a class="nav-link " href="">Search Result</a></h4>
//             </li>            
//         </ul>
//     '

}

?>