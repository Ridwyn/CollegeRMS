<?php
namespace Controller;
class CourseController {
 private $courseTable;
 private $teacherTable;
 private $moduleTable;


 public function __construct($courseTable,$teacherTable,$moduleTable) {
 $this->courseTable = $courseTable;
 $this->teacherTable = $teacherTable;
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
   $teacher=$this->teacherTable->findByID($course['teacher_id'])[0];
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

  foreach ($this->moduleTable->findAll() as  $key=>$name) {
   $this->moduleTable->deleteField('course_id',$course_id); 
  } 

   foreach ($_POST['module'] as  $key=>$name) {
      $modules = $this->moduleTable->findAll();
      $module_id=(int)end($modules)['module_id'];
      $module_id++;
      $module=['module_id'=>$module_id++,'name'=>$name,'course_id'=>$course_id];
      if($module['name'] !==''){
         $this->moduleTable->save($module); 
      }
     
   }
     
   header('location: /course/list');
}

public function editForm(){
   $course=null;
   $teachers=$this->teacherTable->findAll();
   $modules=null;
   if (isset($_GET['id'])) {
      $course = $this->courseTable->findByID($_GET['id'])[0];
     $modules= $this->moduleTable->find('course_id',$_GET['id']);
   } else {
      $course = false;
   }
   return [
      'template' => 'courseForm.html.php',
      'variables' => ['course' => $course,'teachers'=>$teachers,'modules'=>$modules],
      'title' => 'Edit course'
   ];
     
}

 public function delete() {
 $this->courseTable->delete($_GET['id']);
 header('location: /course/list');
 }
 public function home() {
    $courses ='';
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['courses'=>$courses],
        ];
 }
 public function archive() {
   $this->courseTable->archive($_GET['id']);
   header('location: /course/list');
   }
}