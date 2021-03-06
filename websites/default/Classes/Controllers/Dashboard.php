<?php
namespace Classes\Controllers;
class Dashboard {
 private $courseTable;
 private $studentTable;
 private $roomTable;


 public function __construct($courseTable,$studentTable,$roomTable) {
 $this->courseTable = $courseTable;
 $this->studentTable = $studentTable;
 $this->roomTable = $roomTable;
 
 }


 public function home() {
    $courses = $this->courseTable->findAll();
    $rooms = $this->roomTable->findAll();
    $students = $this->studentTable->findAll();
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['courses'=>$courses,'students'=>$students,'rooms'=>$rooms ,'passwordSuggestion'=>$this->randomPassword()],
        ];
 }

 public function list() {
    $courses = $this->courseTable->findAll();
     return[
        'template'=>'courseList.html.php',
        'title' => 'Course list',
        'variables'=>['courses'=>$courses],
        ];
 }


////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $course = $_POST['course'];
   $this->courseTable->save($course);   
   header('location: /course/list');
}

public function editForm(){
   $course=null;
   $teachers=$this->teacherTable->findAll();
   if (isset($_GET['id'])) {
      $course = $this->courseTable->findByID($_GET['id'])[0];
    
   } else {
      $course = false;
   }
   return [
      'template' => 'courseForm.html.php',
      'variables' => ['course' => $course,'teachers'=>$teachers],
      'title' => 'Edit course'
   ];
     
}

public function randomPassword() {
   $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $pass = array(); 
   $alphaLength = strlen($alphabet) - 1;
   for ($i = 0; $i < 8; $i++) {
       $n = rand(0, $alphaLength);
       $pass[] = $alphabet[$n];
   }
   return implode($pass); 
}



}