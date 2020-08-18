<?php
namespace Classes\Controllers;
class Website {

 public function __construct() {
 }

 public function about() {
     return[
        'template'=>'website_about.html.php',
        'title' => 'About',
        'variables'=>[],
        ];
 }
 public function home() {
     return[
        'template'=>'website_home.html.php',
        'title' => 'WUC',
        'variables'=>[],
        ];
 }
 public function international(){

   
   return[
      'template'=>'website_international.html.php',
      'title' => 'International',
      'variables'=>[],
   ];
 }
 public function postgraduate(){

   
   return[
      'template'=>'website_postgraduate.html.php',
      'title' => 'Postgraduate',
      'variables'=>[],
   ];
 }
 public function student_life(){

   
   return[
      'template'=>'website_student_life.html.php',
      'title' => 'Student Life',
      'variables'=>[],
   ];
 }
 public function undergraduate(){

   
   return[
      'template'=>'website_undergraduate.html.php',
      'title' => 'undergraduate',
      'variables'=>[],
   ];
 }





}