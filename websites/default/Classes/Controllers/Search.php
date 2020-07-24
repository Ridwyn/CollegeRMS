<?php
namespace Classes\Controllers;
class Search  {
 private $courseTable;
 private $studentTable;
 private $staffTable;



 public function __construct($courseTable,$studentTable,$staffTable) {
 $this->courseTable = $courseTable;
 $this->studentTable = $studentTable;
 $this->staffTable = $staffTable;
 
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
        $studentString= strtolower(trim($student['Fname'].$student['Sname'].$student['email']));
        
        if(strpos($studentString,$searchString) !== false){
            array_push($found,$student);
        }
    }
    return $found;
 }

 public function matchedStaffs($searchString){
    $staffs = $this->staffTable->findAll();
    $found=[];
    foreach($staffs as $index => $staff) { 
        $staffString= strtolower(trim($staff['Fname'].$staff['Sname'].$staff['email']));
        
        if(strpos($staffString,$searchString) !== false){
            array_push($found,$staff);
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
  $staffs =$this->matchedStaffs($searchString);
  $results=['courses'=>$courses,'students'=>$students,'staffs'=>$staffs];


   return[
    'template'=>'searchResult.html.php',
    'title' => 'Result',
    'variables'=>['results'=>$results,'searchterm'=>$searchString],
    ];
 
}





}