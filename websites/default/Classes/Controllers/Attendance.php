<?php
namespace Classes\Controllers;
class Attendance {
 private $studentTable;
 public function __construct($studentTable) {
 $this->studentTable = $studentTable;
 }
 public function list() {
    $students = $this->studentTable->findAll();
     return[
        'template'=>'studentList.html.php',
        'title' => 'student list',
        'variables'=>['students'=>$students],
        ];
 }
 public function view(){
   $student = $this->studentTable->findByID($_GET['id'])[0];
   return[
      'template'=>'studentView.html.php',
      'title' => 'student list',
      'variables'=>['student'=>$student],
      ];
 }
}