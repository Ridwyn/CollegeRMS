
<?php

class Student {
 public $studentTable;
 public $id;
 public $fname;
 public $sname;
 public $dob;
 public $username;
 public $password;
 public $address;
 public $email;
 public $contact_no;
 public $start_ate;
 public $course;
 public $es_grade_date;
 public $course_id;

 public function __construct(\CSY2028\DatabaseTable $studentTable=null) {
 $this->studentTable = $studentTable;
 }
 public function getStudent() {
 return $this->studentTable->find('id', $this->authorId)[0];
 }
public function getNewStudentForm(){
    
}

}
?>