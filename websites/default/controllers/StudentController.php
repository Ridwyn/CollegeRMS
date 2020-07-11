<?php
namespace Controller;
class StudentController {
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

////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $student = $_POST['student'];
   $this->studentTable->save($student);   
   header('location: /student/list');
}

public function editForm(){
   $student=null;
   if (isset($_GET['id'])) {
      $student = $this->studentTable->findByID($_GET['id'])[0];
     
   } else {
      $student = false;
   }
   return [
      'template' => 'studentForm.html.php',
      'variables' => ['student' => $student],
      'title' => 'Edit student'
   ];
     
}

 public function delete() {
   $this->studentTable->delete($_GET['id']);
   header('location: /student/list');
 }

 public function home() {
    $students ='';
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['students'=>$students],
        ];
 }
 public function archive() {
   $this->studentTable->archive($_GET['id']);
   header('location: /student/list');
 }
}