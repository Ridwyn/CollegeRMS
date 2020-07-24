<?php
namespace Classes\Controllers;
class Register {
 private $lectureTable;
 private $studentTable;
 private $staffTable;
 private $moduleTable;
 private $roomTable;

 public function __construct($lectureTable,$studentTable,$staffTable,$moduleTable,$roomTable) {
 $this->lectureTable = $lectureTable;
 $this->studentTable = $studentTable;
 $this->staffTable = $staffTable;
 $this->moduleTable = $moduleTable;
 $this->roomTable = $roomTable;
 }

 public function register(){

    $lecturesTimetable=[];
    $size;

    if ($_SESSION['usertype']=='teacher') {
        $staff=$this->staffTable->findByID($_SESSION['id'])[0];
        $modules=$this->moduleTable->find('staff_id',$staff['staff_id']);
        
        foreach ($modules as $key => $module) {
            $lectures=$this->lectureTable->find('module_id',$module['module_id']);
            foreach ($lectures as $index => $lecture) {
                $size=count($lecture);
                $room=$this->roomTable->findByID($lecture['room_id'])[0];
                $d['module_name']=$module['name'];
                $d[$size++]=$module['name'];
                $d['room_number']=$room['room_number'];
                $d[$size++]=$room['room_number'];
                $a=$lecture+=$d;
                $lecturesTimetable[$key]=$a;
            }
        }
    }

    return[
        'template'=>'register.html.php',
        'title' => '',
        'variables'=>['lecturesTimetable'=>$lecturesTimetable],
        ];


 }

 public function registerLecture(){
    $students_on_lecture=[];
    $size;

    $lecture=$this->lectureTable->findByID($_GET['id'])[0];
    $module=$this->moduleTable->find('module_id',$lecture['module_id'])[0];
    $students=$this->studentTable->find('course_id',$module['course_id']);
    // var_dump($lecture);
    // var_dump($students);

        // $staff=$this->staffTable->findByID($_SESSION['id'])[0];
        // $modules=$this->moduleTable->find('staff_id',$staff['staff_id']);
        
    // foreach ($modules as $key => $module) {
    //         $lectures=$this->lectureTable->find('module_id',$module['module_id']);
            foreach ($students as $index => $student) {
                $size=count($student);
                // $room=$this->roomTable->findByID($student['room_id'])[0];
                $d['module_name']=$module['name'];
                $d[$size++]=$module['name'];
                $d['lecture_id']=$lecture['lecture_id'];
                $d[$size++]=$lecture['lecture_id'];
                $d['lecture_start_date']=$lecture['start_date'];
                $d[$size++]=$lecture['start_date'];
                $d['lecture_end_date']=$lecture['end_date'];
                $d[$size++]=$lecture['end_date'];
                $a=$student+=$d;
                $students_on_lecture[$index]=$a;
            }

            var_dump($lectures_with_students);
        // }

    return[
        'template'=>'registerLecture.html.php',
        'title' => '',
        'variables'=>['students_on_lecture'=>$students_on_lecture],
        ];
 }



}