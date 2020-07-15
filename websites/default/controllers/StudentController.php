<?php
namespace Controller;
class StudentController {
 private $studentTable;
 private $usertable;
 public function __construct($studentTable,$usertable) {
 $this->studentTable = $studentTable;
 $this->usertable = $usertable;
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
   $student_id= $this->studentTable->save($student) ?? $_POST['student']['student_id'];
   $username=''.$student_id.'-student';
   $userFound=$this->usertable->find('username',$username);
   $data=['username'=>$username,'password'=>$this->randomPassword(),'user_type'=>'student'];
 
   if(!$userFound){
      $this->usertable->insert($data);
   }
   header('location: /student/list');
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
}