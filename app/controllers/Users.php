<?php

    class Users extends Controller{
        public function __construct()
        {
            $this->userModel = $this->model('Process');
        }

        // ---------------------- //
        // LOGIN                  //
        // ---------------------- //
        public function login() {    
            $data = [
                'title' => 'Login page',
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => '',
                'loginError' =>''
            ];

            // Login form submit handler
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST);
                $data = [
                    'title' => 'Login page',
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => '',
                    'loginError' =>''
                ];

                // Check if any of the inputs empty
                if (empty($data['email']) || empty($data['password'])) {
                    $data['loginError'] = 'Password or email is incorrect. Please try again.';

                    $this->view('index', $data);
                }

                // Validate email
                $emailValid = checkValidEmail($data['email']);
                 if(!$emailValid['result']){
                     $data['emailError'] = $emailValid['error'];
                  }
                
                //Check if all errors are empty
                if (empty($data['emailError']) && empty($data['passwordError'])) {
                    // Login 
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                    if ($loggedInUser) {
                        // Set session variables
                        createUserSession($loggedInUser);
                    } else {
                        $data['loginError'] = 'Password or email is incorrect. Please try again.';

                        $this->view('index', $data);
                    }
                }

            };
    
            $this->view('index', $data);
        }


        // ---------------------- //
        // REGISTER               //
        // ---------------------- //
        public function register(){
            $data = [
            'title' => 'Sign up',
            'firstName' => '',
            'lastName' => '',
            'address' => '',
            'email' => '',
            'password' => '',
            'confirmPassword' => '',
            'firstNameError' => '',
            'lastNameError' => '',
            'emailError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'addressError' => ''
        ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST);

                $data = [
                    'title' => 'Sign up',
                    'firstName' => trim($_POST['first_name']),
                    'lastName' => trim($_POST['last_name']),
                    'address' => trim($_POST['address']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'firstNameError' => '',
                    'lastNameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => '',
                    'addressError' => ''
                ];

                // VALIDATE INPUTS

                // Check if address is empty
                $checkEmptyInput = checkEmptyInputs(array('address' => $data['address']));
                if(!$checkEmptyInput['result']){
                    foreach($checkEmptyInput['errors'] as $key => $val){
                        $data[$key] = $val;
                    }
                }

                // Validate name
                $firstNameValid = checkValidName($data['firstName']);
                 if(!$firstNameValid['result']){
                     $data['firstNameError'] = $firstNameValid['error'];
                  }

                $lastNameValid = checkValidName($data['lastName']);
                if(!$lastNameValid['result']){
                    $data['lastNameError'] = $lastNameValid['error'];
                }

                // Validate email
                $emailValid = checkValidEmail($data['email']);
                 if(!$emailValid['result']){
                     $data['emailError'] = $emailValid['error'];
                  }else{
                      //Check if email exists.
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['emailError'] = 'Email is already taken.';
                    }
                  }
                
                  // Validate password
                  $passwordValid = checkValidPassword($data['password']);
                  if(!$passwordValid['result']){
                    $data['passwordError'] = $passwordValid['error'];
                  }
                    
                  // Check confirm password
                  $checkPassword = checkPasswords($data['password'], $data['confirmPassword']);
                  if(!$checkPassword['result']){
                    $data['confirmPasswordError'] = $checkPassword['error'];
                  }


                  if (empty($data['nameError']) && empty($data['emailError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['addressError'])){
                     // Hash password
                     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                     //Register user from model function
                    if ($this->userModel->register($data)) {
                        //Redirect to the login page
                        header('location: ' . URLROOT);
                    } else {
                        die('Something went wrong.');
                    }
                    
                  }
            };
            
            $this->view('registration', $data);
        }

        // ---------------------- //
        // HOME (USER LIST)       //
        // ---------------------- //
        public function home() {
            if(isLoggedIn()){
                $users = json_decode(json_encode($this->userModel->getUsers()), true);
                $data = [
                    'title' => 'Home',
                    'users' => $users
                ];
                $this->view('home', $data);
            } else {
                $this->logout();
            }
        }

        // ---------------------- //
        // EDIT USER              //
        // ---------------------- //
        public function editUser() {
            if(isLoggedIn()){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //Sanitize post data
                    $_POST = filter_input_array(INPUT_POST);
                    if(isset($_POST['edit_row']))
                    {
                        $data = [
                            'id' => trim($_POST['id']),
                            'firstName' => trim($_POST['firstName']),
                            'lastName' => trim($_POST['lastName']),
                            'email' => trim($_POST['email']),
                            'firstNameError'=> '',
                            'lastNameError'=> '',
                            'emailError' => '',
                            'result' => false
                        ];

                        // Validate name
                        $firstNameValid = checkValidName($data['firstName']);
                        if(!$firstNameValid['result']){
                            $data['firstNameError'] = $firstNameValid['error'];
                        }
                        $lastNameValid = checkValidName($data['lastName']);
                        if(!$lastNameValid['result']){
                            $data['lastNameError'] = $lastNameValid['error'];
                        }

                        // Validate email
                        $emailValid = checkValidEmail($data['email']);
                        if(!$emailValid['result']){
                            $data['emailError'] = $emailValid['error'];
                        }
                        else{
                            //Check if email exists.
                            if ($this->userModel->findUserByEmail($data['email'])) {
                                $data['emailError'] = 'Email is already registered.';
                            }
                        }


                        if(empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['emailError'])){
                            //Update user from model function
                            if ($this->userModel->updateUser($data)) {
                                $data['result'] = true;
                                echo json_encode($data);
                            } else {
                                die('Something went wrong.');
                            }
                        }else{
                            echo json_encode($data);
                        }
                        

                    }
                }
            }else{
                $this->logout();
            }
        }

        // ---------------------- //
        // DELETE USER            //
        // ---------------------- //
        public function deleteUser(){
            if(isLoggedIn()){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //Sanitize post data
                    $_POST = filter_input_array(INPUT_POST);

                    if(isset($_POST['delete_row']))
                    {
                        $data = [
                            'id' => trim($_POST['id']),
                            'result' => false,
                            'error' => ''
                        ];

                        if($this->userModel->deleteUser($data['id'])){
                            $data['result'] = true;
                            echo json_encode($data);
                        }else{
                            $data['error'] = 'Could not delete user';
                            echo json_encode($data);
                        }
                    }
                }
            }else{
                $this->logout();
            }
        }


        // ---------------------- //
        // LOGOUT                 //
        // ---------------------- //

        public function logout() {
            unset($_SESSION['user_id']);
            unset($_SESSION['email']);
            unset($_SESSION['LAST_ACTIVITY']);

            header('location:' . URLROOT);
        }

    }
    