<?php
namespace Classes\Controllers;
class Assignment {
 private $staffTable;
 private $assignmentTable;

 
 public function __construct($assignmentTable, $staffTable, $moduleTable) {
 $this->staffTable = $staffTable;
 $this->assignmentTable = $assignmentTable;
 $this->moduleTable = $moduleTable;

 }

    public function list() {
        $assignments = $this->assignmentTable->find('staff_id',$_SESSION['id']);
        return[
            'template'=>'assignmentList.html.php',
            'title' => 'Assignments',
            'variables'=>['assignments'=>$assignments],
            ];
            
    }
//     public function view(){
//         $module = $this->moduleTable->findByID($_GET['id'])[0];
//         $course = $this->courseTable->findByID($module['course_id'])[0];
//         $staff=null;
//         if(!empty($this->staffTable->findByID($module['staff_id'])[0])){
//         $staff=$this->staffTable->findByID($module['staff_id'])[0];
//         }
//         return[
//         'template'=>'moduleView.html.php',
//         'title' => 'course list',
//         'variables'=>['course'=>$course,'module'=>$module,'staff'=>$staff],
//         ];
//     }

    
 public function editSubmit(){
    $assignment = $_POST['assignment'];

    $this->assignmentTable->save($assignment); 
    header('location: /assignment/list');
 
 }

 
 public function editForm(){
    $assignment=null;
    $teacher = $this->staffTable->findByID($_SESSION['id'])[0];
    $modules = $this->moduleTable->find('staff_id', $_SESSION['id']);
  

    if (isset($_GET['id'])) {
       $assignment = $this->assignmentTable->findByID($_GET['id'])[0];
    } else {
       $assignment = false;
    }
    return [
       'template' => 'assignmentForm.html.php',
       'variables' => ['assignment' => $assignment,'teacher' => $teacher, 'modules' => $modules],
       'title' => 'Edit assignment'
    ];
 }

 public function delete() {
    $this->assignmentTable->delete($_GET['id']);
    header('location: /assignment/list');
  }
 


}