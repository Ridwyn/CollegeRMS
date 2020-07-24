<?php
namespace Classes\Controllers;
class Timetable {
 private $staffTable;
 private $studentTable;
 private $courseTable;
 private $moduleTable;
 private $lectureTable;
 private $roomTable;

 public function __construct($staffTable,$studentTable,$courseTable,$moduleTable,$lectureTable,$roomTable) {
 $this->studentTable = $studentTable;
 $this->staffTable = $staffTable;
 $this->courseTable = $courseTable;
 $this->moduleTable = $moduleTable;
 $this->lectureTable = $lectureTable;
 $this->roomTable = $roomTable;
 }
 public function view() {
     $lecturesTimetable=[];
     $size;
     if ($_SESSION['usertype']=='student') {
        $student=$this->studentTable->findByID($_SESSION['id'])[0];
        $modules=$this->moduleTable->find('course_id',$student['course_id']);
        foreach ($modules as $key => $module) {
            $lectures=$this->lectureTable->find('module_id',$module['module_id']);
            foreach ($lectures as $index => $lecture) {
                $size=count($lecture);
                $room=$this->roomTable->findByID($lecture['room_id'])[0];
                $staff=$this->staffTable->findByID($lecture['staff_id'])[0];
                $d['module_name']=$module['name'];
                $d[$size++]=$module['name'];
                $d['room_number']=$room['room_number'];
                $d[$size++]=$room['room_number'];
                $d['staff_name']=$staff['Fname'].' '.$staff['Sname'];
                $d[$size++]=$staff['Fname'].''.$staff['Sname'];
                $a=$lecture+=$d;
                $lecturesTimetable[$key]=$a;
            }
        }
    }

    if ($_SESSION['usertype']=='teacher') {
        $staff=$this->staffTable->find('staff_id',$_SESSION['id'])[0];
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
        'template'=>'timetableView.html.php',
        'title' => 'Result',
        'variables'=>['lecturesTimetable'=>$lecturesTimetable],
        ];

 }
}