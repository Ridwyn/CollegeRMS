<?php
namespace Classes\Controllers;
class Grade {
 private $staffTable;
 private $assignmentTable;
 private $studentsTable;
 private $gradeTable;

 
 public function __construct($gradeTable, $staffTable, $studentsTable, $assignmentTable, $moduleTable) {
 $this->staffTable = $staffTable;
 $this->assignmentTable = $assignmentTable;
 $this->studentsTable = $studentsTable;
 $this->gradeTable = $gradeTable;
 $this->moduleTable = $moduleTable;

 }

    // public function list() {
    //     $assignments = $this->assignmentTable->find('staff_id',$_SESSION['id']);
    //     return[
    //         'template'=>'assignmentList.html.php',
    //         'title' => 'Assignments',
    //         'variables'=>['assignments'=>$assignments],
    //         ];
            
    // }
    
 public function editSubmit(){
    $grade = $_POST['grade'];

    $this->gradeTable->save($grade); 
    header('location: /assignment/list');
 
 }

 
 public function editForm(){
  
    $students = $this->studentsTable->findByID($_SESSION['id']);
    $modules = $this->moduleTable->find('staff_id', $_SESSION['id']);
  

    if (isset($_GET['id'])) {
       $assignment = $this->assignmentTable->findByID($_GET['id'])[0];
       
    } else {
       $assignment = false;
    }
    return [
       'template' => 'gradeForm.html.php',
       'variables' => ['assignment' => $assignment, 'students' => $students],
       'title' => 'Grade Form'
    ];
 }


}