<?php
namespace Controller;
class StaffController {
 private $teacherTable;
 private $adminTable;
//  private $staffs=[
//    ['name'=>"john",'id'=>1],
//    ['name'=>"mary",'id'=>2],
//    ['name'=>"doe",'id'=>3],
//    ['name'=>"barry",'id'=>4],
//    ['name'=>"steve",'id'=>5],
//    ['name'=>"fred",'id'=>6],
//    ['name'=>"ryan",'id'=>7],
// ];
 public function __construct($teacherTable,$adminTable) {
   $this->teacherTable = $teacherTable;
   $this->adminTable = $adminTable;
 }
 public function list() {
   
    $teachers = $this->teacherTable->findAll();
    $admins = $this->adminTable->findAll();
    $staffs=['teachers'=>$teachers,'admins'=>$admins];
     return[
        'template'=>'staffList.html.php',
        'title' => 'Staff list',
        'variables'=>['staffs'=>$staffs],
        ];
 }
 public function view(){
    $staff=null;
    if($_GET['staff']=='teacher'){
      $staff=$this->teacherTable->findByID($_GET['id']);
   }
   if($_GET['staff']=='admin'){
      $staff=$this->adminTable->findByID($_GET['id']);
   }
   return[
      'template'=>'staffView.html.php',
      'title' => 'Staff list',
      'variables'=>['staff'=>$staff[0]],
      ];
 }

////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $date = new \DateTime();
   if(isset($_POST['teacher'])){
      $staff = $_POST['teacher'];
      $staff['start_date'] = $date->format('Y-m-d H:i:s');
      $this->teacherTable->save($staff);
   }
   if (isset($_POST['admin'])) {
      $staff = $_POST['admin'];
      $this->adminTable->save($staff);
   }
   

   
   header('location: /staff/list');
}

public function editForm(){
   $staff=null;
   if (isset($_GET['id'])) {

      if($_GET['staff']=="teacher"){
         $teacher = $this->teacherTable->findByID($_GET['id']);
         return [
            'template' => 'teacherForm.html.php',
            'variables' => ['teacher' => $teacher[0]],
            'title' => 'Edit Staff'
         ];
      }
      if($_GET['staff']=="admin"){
         $admin = $this->adminTable->findByID($_GET['id']);
         return [
            'template' => 'adminForm.html.php',
            'variables' => ['admin' => $admin[0]],
            'title' => 'Edit Staff'
         ];
      }

   } else {
      $template=''.$_GET['staff'].'Form.html.php';
      $var=$_GET['staff'];
      return [
         'template' => $template,
         'variables' => [$var=>false],
         'title' => 'Edit Staff'
      ];
   } 
}

public function addForm(){
   return [
      'template' => 'teacherForm.html.php',
      'variables' => ['teacher' => $teacher[0]],
      'title' => 'Edit Staff'
   ];
}

 public function home() {
    $staffs ='';
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['staffs'=>$staffs],
        ];
 }

 public function delete() {

   if($_GET['staff']=='teacher'){
      $this->teacherTable->delete($_GET['id']);
      header('location: /staff/list');
      }
      else if ($_GET['staff']=='admin')
      {
      $this->adminTable->delete($_GET['id']);
      header('location: /staff/list');
      }
 }

 public function archive() {
   if($_GET['staff']=='teacher'){
   $this->teacherTable->archive($_GET['id']);
   header('location: /staff/list');
   }
   else if ($_GET['staff']=='admin')
   {
   $this->adminTable->archive($_GET['id']);
   header('location: /staff/list');
   }
   else {}
 }
}