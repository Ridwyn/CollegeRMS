<?php
namespace Classes\Controllers;
class Student {
 private $studentTable;
 private $usertable;
 public function __construct($studentTable,$usertable,$courseTable) {
 $this->studentTable = $studentTable;
 $this->usertable = $usertable;
 $this->courseTable = $courseTable;
 }
 public function list() {
    $students=null;
    if(isset($_GET['id'])){
    $students = $this->studentTable->find('course_id',$_GET['id']);
    }
    else{
    $students = $this->studentTable->findAll();
    }
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
   $student_id= $this->studentTable->save($student) ?? $_POST['student']['student_id'];
   $username=''.$student_id.'-student';
   $userFound=$this->usertable->find('username',$username);
   $data=['username'=>$username,'password'=>$this->randomPassword(),'user_type'=>'student'];
 
   if(!$userFound){
      $this->usertable->insert($data);
   }
   if($_SESSION['usertype']=='admin'){
   header('location: /student/list');
   }
   else {
      header('location: /student?id='.$_SESSION['id']);
   }
}

public function randomPassword() {
   $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   $pass = array(); 
   $alphaLength = strlen($alphabet) - 1;
   for ($i = 0; $i < 5; $i++) {
       $n = rand(0, $alphaLength);
       $pass[] = $alphabet[$n];
   }
   return implode($pass); 
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


 public function enrollmentForm(){
   $student=null;
   $courses= $this->courseTable->findAll();

      $student = $this->studentTable->findByID($_GET['id'])[0];

   return [
      'template' => 'enrollmentForm.html.php',
      'variables' => ['student' => $student, 'courses' => $courses],
      'title' => 'Enrollment' 
   ];
  

}
 public function enrollmentSubmit(){
   $student = $_POST['student'];
   $courseName=$this->courseTable->findByID($_POST['student']['course_id'])[0]['name'];
   $student['course']= $courseName;
  $student_id= $this->studentTable->save($student)?? $_POST['student']['student_id'];    
   header('location: /student?id='.$student_id.'');
}






}