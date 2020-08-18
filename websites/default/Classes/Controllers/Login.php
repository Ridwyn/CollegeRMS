<?php
//Handles login pages
namespace Classes\Controllers;

class Login {
    private $authentication;
    private $userTable;

    public function __construct($authentication,$userTable) {
         $this->authentication = $authentication;
         $this->userTable = $userTable;
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


        //Handles request to login, authenticates the credentials.
        public function successfullReset($success) {
        
            if ($this->authentication->login($_POST['username'], $_POST['password'])) {
                if($_SESSION['usertype']=='student'){
                    header('location: /announcement/list?success='.$success.''); 
                }else{
                    header('location: /dashboard?success='.$success.'');  
                }
                
            }
            else {
                return ['template' => 'login.html.php',
                    'title' => 'Login',
                    'variables' => [ 'error'=>'Username or Password might be incorrect'  ]
                ];
    
               
            }
          
           
        }

    public function unauthorised(){
        return ['template' => 'unauthorised.html.php',
        'title' => '401',
        'variables' => [  ]
    ]; 
    }


    public function passwordReset(){
        $user=$this->userTable->find('username',$_POST['username'])[0];
        $user['password']=$_POST['password'];
        unset($user[0],$user[1],$user[2],$user[3]);
        $this->userTable->save($user);
        $success='Password Reset Succesfully';
       return ($this->successfullReset($success));
    }
}