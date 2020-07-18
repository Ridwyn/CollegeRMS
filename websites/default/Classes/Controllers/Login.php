<?php
//Handles login pages
namespace Classes\Controllers;

class Login {
    private $authentication;

    public function __construct($authentication) {
         $this->authentication = $authentication;
    }
    //Displays login page
    public function login() {
        return ['template' => 'login.html.php',
            'title' => 'Login',
            'variables' => ['error'=>'' ]
            
        ];
    }
    //Displays logout page and removes session
    public function logout() {
        session_destroy();
        header('location: /login');
    }

    
    //Handles request to login, authenticates the credentials.
    public function loginSubmit() {
        
        if ($this->authentication->login($_POST['username'], $_POST['password'])) {
            if($_SESSION['usertype']=='student'){
                header('location: /announcement/list'); 
            }else{
                header('location: /dashboard');  
            }
            
            
           
        }
        else {
            return ['template' => 'login.html.php',
                'title' => 'Login',
                'variables' => [ 'error'=>'Username or Password might be incorrect'  ]
            ];

           
        }
      
       
    }
}