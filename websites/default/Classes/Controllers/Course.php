<?php
namespace Classes\Controllers;
class Course {
 private $courseTable;
 private $staffTable;
 private $moduleTable;


 public function __construct($courseTable,$staffTable,$moduleTable) {
 $this->courseTable = $courseTable;
 $this->staffTable = $staffTable;
 $this->moduleTable = $moduleTable;
 }

 public function list() {
    $courses = $this->courseTable->findAll();
     return[
        'template'=>'courseList.html.php',
        'title' => 'Course list',
        'variables'=>['courses'=>$courses],
        ];
 }
 public function view(){
   $course = $this->courseTable->findByID($_GET['id'])[0];
   $modules = $this->moduleTable->find('course_id',$_GET['id']);
  
   $teacher=null;
   if(!empty($this->staffTable->findByID($course['staff_id'])[0])){
      $teacher=$this->staffTable->findByID($course['staff_id'])[0];
   }
   
   return[
      'template'=>'courseView.html.php',
      'title' => 'course list',
      'variables'=>['course'=>$course,'modules'=>$modules,'teacher'=>$teacher],
   ];
 }

////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $course = $_POST['course'];
   $course_id= $this->courseTable->save($course) ??$_POST['course']['course_id'] ; 
    
   header('location: /course/list');
}

public function editForm(){
   $course=null;
   $staffs=$this->staffTable->find('stafftype','teacher');

   $modules=[];
   if (isset($_GET['id'])) {
      $course = $this->courseTable->findByID($_GET['id'])[0];
   } else {
      $course = false;
   }
   return [
      'template' => 'courseForm.html.php',
      'variables' => ['course' => $course,'staffs'=>$staffs,'modules'=>$modules],
      'title' => 'Edit course'
   ];
}

 public function delete() {
 $this->courseTable->delete($_GET['id']);
 header('location: /course/list');
 }

 
 public function archive() {
   $this->courseTable->archive($_GET['id']);
   header('location: /course/list');
   }
}