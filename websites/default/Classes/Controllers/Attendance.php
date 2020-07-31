<?php
namespace Classes\Controllers;
class Attendance {
 private $lectureTable;
 private $studentTable;
 private $moduleTable;
 private $registerTable;
 public function __construct($lectureTable,$studentTable,$moduleTable,$registerTable) {
 $this->lectureTable = $lectureTable;
 $this->studentTable = $studentTable;
 $this->moduleTable = $moduleTable;
 $this->registerTable = $registerTable;
 }

   public function attendancePercentageCalc($numOfAttendance,$totalAttendance){
      if($totalAttendance==0){
         return 0;
      }
      return(ceil(($numOfAttendance*100)/$totalAttendance));
   }

 public function view(){
   $student = $this->studentTable->findByID($_SESSION['id'])[0];
   $modules=$this->moduleTable->find('course_id',$student['course_id']);
   $modules_with_Attendance=[];
   $size;
   foreach ($modules as $key => $module) {
      $size=count($module);
      $registers=$this->registerTable->findMultiple('student_id',$student['student_id'],'module_id',$module['module_id']);
      $lectures=$this->lectureTable->find('module_id',$module['module_id']);
      $d['attendance']=$this->attendancePercentageCalc(count($registers),count($lectures));
      $d[$size++]=$this->attendancePercentageCalc(count($registers),count($lectures));
      $a=$module+=$d;
      $modules_with_Attendance[$key]=$a;
   }


   return[
      'template'=>'attendance.html.php',
      'title' => 'Attendance',
      'variables'=>['modules_with_Attendance'=>$modules_with_Attendance],
      ];
 }




}