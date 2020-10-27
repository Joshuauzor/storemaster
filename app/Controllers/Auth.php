<?php namespace App\Controllers;

// import models

use App\Models\UserModel;
use App\Models\StockModel;
// use App\Models\Business;
// use App\Models\Branch;

// import configurations
use Config\Services;
use Config\Database;

class Auth extends BaseController
{

    public function __construct()
    {
       helper(['form, url']); 
    }

	public function index()
	{
        // initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
        $db = \Config\Database::connect();
        
        $data['title'] = 'Login || Store Master';

        if($this->request->getMethod() == 'post'){ 
            $rules = [
                'email' => 'required|trim|min_length[5]',
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'min_length' => 'Password is too short'
                    ]
                ]
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{

                $UserModel = new UserModel();

                $user = $UserModel->where('email', $this->request->getPost('email'))->first();

                if($user){
                    $passwordConfirm = password_verify($this->request->getPost('password'), $user['password']);
                    if($passwordConfirm){
                        $this->setUserSession($user);
                        return redirect()->to(base_url('home'));
                    }
                    else{
                        $session->setFlashdata('error', 'Invalid Email and/or Password');
                        return redirect()->to(base_url());
                    }
                }
                else{              
                    $session->setFlashdata('error', 'Invalid Email and/or Password');
                    return redirect()->to(base_url());
                }
            }
        }

		echo view('login', $data);
	}

	//--------------------------------------------------------------------

	public function register(){

        //protect url begins
        if(!  session()->get('isLoggedIn'))
        return  redirect()->to(base_url());
        //protect url end

        // initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
        $data['title'] = 'Registration || Store Master';

        if($this->request->getMethod() == 'post'){
            $rules = [
                'firstname' => 'required|trim',
                'lastname' => 'required|trim',
                'sex' => 'required',
                'phone' => 'required|trim',
                'master_code' => 'required|trim',
                'position' => 'required',
                'email' => [
                    'rules' => 'required|trim|is_unique[users.email]|min_length[6]|valid_email',
                    'errors' => [
                        'is_unique' => 'Email is not available!',
                        'valid_email' => 'Email is not valid',
                        'min_length' => 'Email is too short',
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]',
                    'errors' => [
                        'min_length' => 'Password is too short'
                    ],
                ],
                'confirm_password' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'matches' => 'Both Password do not match'
                    ]
                ]

            ];

            //end of rules

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }
            else{
                $UserModel = new UserModel();

                $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

                $data = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'sex' => $_POST['sex'],
                    'phone' => $_POST['phone'],
                    'email' => $_POST['email'],
                    'password' => $hashedPassword,
                    'position' => $_POST['position']
                );
                $UserModel->insert($data);
                $user = $UserModel->where('email', $this->request->getPost('email'))->first();
                $this->setUserSession($user);
                $session->setFlashdata('success', 'User Created!');
                return redirect()->to(base_url('home'));
            }
            
        }

        echo view('register', $data);

    }
    
    //--------------------------------------------------------------------
        
    private function setUserSession($user){
        $db = \Config\Database::connect();
        $UserModel = new UserModel();
        $data = [
            'id' => $user['id'],
            'email' => $user['email'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'position' => $user['position'],
            'sex' => $user['sex'],
            'phone' => $user['phone'],
            'isLoggedIn' => true

        ];
        session()->set($data);
        return true;

    }

    //--------------------------------------------------------------------

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }

}