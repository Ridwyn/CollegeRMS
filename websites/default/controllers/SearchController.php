<?php
namespace Controller;
class SearchController {
 private $courseTable;
 private $studentTable;
 private $teacherTable;
 private $adminTable;



 public function __construct($courseTable,$studentTable,$teacherTable,$adminTable) {
 $this->courseTable = $courseTable;
 $this->studentTable = $studentTable;
 $this->teacherTable = $teacherTable;
 $this->adminTable = $adminTable;
 
 }


 public function home() {
    $courses = $this->courseTable->findAll();
    $rooms = $this->roomTable->findAll();
    $students = $this->studentTable->findAll();
  
    return[
        'template'=>'dashboard.html.php',
        'title' => 'DashBoard',
        'variables'=>['courses'=>$courses,'students'=>$students,'rooms'=>$rooms],
        ];
 }

 public function matchedCourses($searchString){
    $courses = $this->courseTable->findAll();
    $found=[];
    foreach($courses as $index => $course) { 
        $courseName=strtolower(trim($course['name']));

        if(strpos($courseName,$searchString) !== false){
            array_push($found,$course);
        }
    }
    return $found;
 }
 public function matchedStudents($searchString){
    $students = $this->studentTable->findAll();
    $found=[];
    foreach($students as $index => $student) { 
        $studentString= strtolower(trim($student['Fname'].$student['Sname'].$student['username'].$student['email']));
        
        if(strpos($studentString,$searchString) !== false){
            array_push($found,$student);
        }
    }
    return $found;
 }
 public function matchedTeachers($searchString){
    $teachers = $this->teacherTable->findAll();
    $found=[];
    foreach($teachers as $index => $teacher) { 
        $teacherString= strtolower(trim($teacher['Fname'].$teacher['Sname'].$teacher['username'].$teacher['email']));
        
        if(strpos($teacherString,$searchString) !== false){
            array_push($found,$teacher);
        }
    }
    return $found;
 }
 public function matchedAdmins($searchString){
    $admins = $this->adminTable->findAll();
    $found=[];
    foreach($admins as $index => $admin) { 
        $adminString= strtolower(trim($admin['Fname'].$admin['Sname'].$admin['username']));
        
        if(strpos($adminString,$searchString) !== false){
            array_push($found,$admin);
        }
    }
    return $found;
 }

////////////////////////////
//  NEED TO DO A DATABASE SAVE FUNCTUNTION COMBINING UPDATE AND NEW INSERT
 public function editSubmit(){
   $searchString =strtolower(trim($_POST['searchterm']));
  $courses =$this->matchedCourses($searchString);
  $students =$this->matchedStudents($searchString);
  $teachers =$this->matchedTeachers($searchString);
  $admins =$this->matchedAdmins($searchString);
  $results=['courses'=>$courses,'students'=>$students,'teachers'=>$teachers,'admins'=>$admins];

   return[
    'template'=>'searchResult.html.php',
    'title' => 'Result',
    'variables'=>['results'=>$results,'searchterm'=>$searchString],
    ];
 
}





}