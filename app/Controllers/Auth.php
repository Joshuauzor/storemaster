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
       helper(['form', 'url', 'date']); 
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
                // 'email' => 'required|trim|min_length[5]|valid_email',
                'email' => [
                    'rules' => 'required|trim|min_length[5]|valid_email',
                    'errors' => [
                        'valid_email' => '{value} is not a valid email'
                    ]
                ],
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
                // CHECK LOGIN ATTEMPT
                $throttler = \Config\Services::throttler();
                $allow = $throttler->check('login',4,MINUTE);

                if($allow){
                    $UserModel = new UserModel();

                    $user = $UserModel->where('email', $this->request->getPost('email'))->first();

                    if($user){
                        $passwordConfirm = password_verify($this->request->getPost('password'), $user['password']);
                        if($passwordConfirm){
                            // $this->setUserSession($user);
                            // return redirect()->to(base_url('home'));
                            if($user['status'] == 'inactive'){
                                $session->setFlashdata('error', 'Please check your mail to activate your account');
                                return redirect()->to(current_url());
                            }
                            else{
                                $this->setUserSession($user);
                                return redirect()->to(base_url('home'));
                            }
                        }
                        else{
                            // $session->setFlashdata('error', 'Invalid Email and/or Password');
                            // return redirect()->to(base_url());
                            $data['error'] = 'Invalid Email and/or Password' ;
                        }
                    }
                    else{              
                        // $session->setFlashdata('error', 'Invalid Email and/or Password');
                        // return redirect()->to(base_url());
                        $data['error'] = 'Invalid Email and/or Password' ;

                    }
                }
                // error for failed login attempt
                else{
                    $data['error'] = 'Max no. of failed login attempts. Try again after a minute!' ;
                }
 
            }
        }

		echo view('login', $data);
	}

	//--------------------------------------------------------------------

	public function register(){

        //protect url begins
        // if(!  session()->get('isLoggedIn'))
        // return  redirect()->to(base_url());
        //protect url end

        // initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
        $db = \Config\Database::connect();
        $email = \Config\Services::email();

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
                        'is_unique' => '{value} is not available!',
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
                // get uniid
                $uniid = md5(str_shuffle('habejhefncbbajdrfnuvaemajmbd'.time()));
                $data = array(
                    'firstname' => $_POST['firstname'],
                    'lastname' => $_POST['lastname'],
                    'sex' => $_POST['sex'],
                    'phone' => $_POST['phone'],
                    'email' => $_POST['email'],
                    'password' => $hashedPassword,
                    'position' => $_POST['position'],
                    'uniid' => $uniid,
                    'activation_date' => date('Y-m-d h:i:s')
                );

                $inserted = $UserModel->insert($data);

                if($inserted)
                {
                    $to = $this->request->getVar('email');
                    $subject = 'Account Activation';
                    $message = 'Dear '.$this->request->getVar('firstname', FILTER_SANITIZE_STRING).' '.$this->request->getVar('lastname', FILTER_SANITIZE_STRING).',<br><br> Your Account has been created successfully. <br><br> Kindly click on the link below to activate your account.<br>
                    Click here.<a href="'.base_url().'/auth/activate/'.$uniid.'" target="_blank"><button class="mt-1 btn btn-primary btn-lg">Activate Now</button>
                    </a><br>Thanks, Joshua<br>';

                    $email->setTo($to);
                    $email->setFrom('joshuauzor10@gmail.com', 'Info');
                    $email->setSubject($subject);
                    $email->setmessage($message);
                    /*$filepath = '';
                    $email->attach($filepath); */
                    // $user = $UserModel->where('email', $this->request->getPost('email'))->first();
                    // $this->setUserSession($user);
                    // $session->setFlashdata('success', 'User Created!');
                    // return redirect()->to(base_url('home'));

                    if($email->send()){
                        // echo "success";
                        $session->setFlashdata('success', 'Account created successfully. Please check your mail to activate your account.');
                        return redirect()->to(current_url());
                    }
                    else{
                        $data = $email->printDebugger(['headers']);
                        print_r($data);
                    }
                }
                else
                {
                    $session->setFlashdata('error', 'Opps!!! An Error occured');
                    return redirect()->to(current_url());
                }
                
            }
            
        }

        echo view('register', $data);

    }
    
    //--------------------------------------------------------------------

    public function activate($uniid = null) {
        
        // initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
        $db = \Config\Database::connect();
        $email = \Config\Services::email();
        $UserModel = new UserModel();

        $data['title'] = 'Activate Account || Store Master';

        if(!empty($uniid)) {
            $userdata = $UserModel->where('uniid', $uniid)->first();

            if($userdata){
                // var_dump($userdata); die;
                if($this->verifyExpiryTime($userdata['activation_date'])){
                    // $session->setFlashdata('success', 'yeah!. Activation link is expired!');
                    if($userdata['status'] == 'inactive'){
                        //activate
                        $data = array(
                            'status' => 'active'
                        );
                        // var_dump($uniid); die;

                        $update = $UserModel->updatestatus($uniid, $data);
                        // var_dump($update); die;
                        if($update){
                            $session->setFlashdata('success', 'Account activated!. You can now Login');
                            return redirect()->to(base_url('auth'));
                        }
                        else{
                            $session->setFlashdata('error', 'Opps! Unable to handle your request at the moment');
                        }
                    }
                    else{
                        $session->setFlashdata('success', 'Account already activated!');
                    }
                }
                else{
                    //time expired
                    $session->setFlashdata('error', 'Sorry!. Activation link is expired!');
                }
            }
            else{
                //no user
                $session->setFlashdata('error', 'Sorry!. Unable to find your account!');
            }
        }
        else{
            $session->setFlashdata('error', 'Opps! Unable to handle your request at the moment');
            // return redirect()->to(current_url());
        }
        echo view('activate_view', $data);
    }
    //--------------------------------------------------------------------

    private function verifyExpiryTime($regTime){

        $currTime = now();
        $regtime = strtotime($regTime);
        $diffTime = $currTime - $regtime;
        // var_dump($diffTime); die;
        if(3600 > $diffTime){
            //register
            return true;
        }
        else{
            //expired
            return false;
        }
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
            'isLoggedIn' => true,
            'uniid' => $user['uniid']

        ];
        session()->set($data);
        return true;

    }

    //--------------------------------------------------------------------

    public function forgot_pass(){
        // initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
        $db = \Config\Database::connect();
        $email = \Config\Services::email();
        $UserModel = new UserModel();

        $data['title'] = 'Activate Account || Store Master';

        if($this->request->getMethod() == 'post'){
            $rules = [
                'email' => [
                    'rules' => 'required|trim|min_length[6]|valid_email',
                    'errors' => [
                        'valid_email' => 'Email is not valid',
                        'min_length' => 'Email is too short',
                    ]
                ],
            ];

            if($this->validate($rules)){
                $UserModel = new UserModel();
                $user = $UserModel->checkemail($this->request->getPost('email'));
                // var_dump($user->uniid); die;
                if($user){
                    $data = [
                        'updated_at' => date('Y-m-d h:i:s')
                    ];
                    if($UserModel->updatedata($user->uniid, $data)){
                        $to = $this->request->getVar('email');
                        $subject = 'Reset Password';
                        $message = 'Dear '.$this->request->getVar('firstname', FILTER_SANITIZE_STRING).' '.$this->request->getVar('lastname', FILTER_SANITIZE_STRING).',<br><br> Click on the link below to reset your password.<br><br>Kindly choose a more secured password that you can remember easily
                        Click here.<br><a href="'.base_url().'/auth/reset_pass/'.$user->uniid.'" target="_blank"><button class="mt-1 btn btn-primary btn-lg">Update Password</button>
                        </a><br>Thanks, Joshua<br>';

                        $email->setTo($to);
                        $email->setFrom('joshuauzor10@gmail.com', 'Info');
                        $email->setSubject($subject);
                        $email->setmessage($message);

                        if($email->send()){
                            // echo "success";
                            $session->setFlashdata('success', 'A password reset link has been sent to your email. Please verify within 15mins');
                            return redirect()->to(current_url());
                        }
                        else{
                            $data = $email->printDebugger(['headers']);
                            print_r($data);
                        }
                    }
                    else{
                        $session->setFlashdata('error', 'Unable to reset. Try again!');
                        return redirect()->to(current_url());
                    }
                  
                }
                else{
                    $session->setFlashdata('error', 'Opps! User not available!');
                    return redirect()->to(current_url());
                }
            }
            else{
                $data['validation'] = $this->validator;
            }
        }
        // else{
        //     $session->setFlashdata('error', 'Opps! Unable to handle your request at the moment');
        //     return redirect()->to(current_url());
        // }
        echo view('forgot_pass', $data);

    }
    //--------------------------------------------------------------------
    
    public function reset_pass($uniid=null){
        // initialize validation
     $validation =  \Config\Services::validation();
     $session = session();
     $db = \Config\Database::connect();
     $email = \Config\Services::email();
     $UserModel = new UserModel();

     $data['title'] = 'Activate Account || Store Master';
        // var_dump($uniid); die;
        if(!empty($uniid)) {
            $userdata = $UserModel->where('uniid', $uniid)->first();
            if($userdata){ 
                // check expiry time method
                if($this->checkExpiryDate($userdata['updated_at'])){
                //   begin form submission when all rules are met
                    if($this->request->getMethod()=='post'){
                        $rules = [
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
                        if($this->validate($rules)){
                            $hashedPassword = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                            $data = [
                                'password' => $hashedPassword
                            ];
                            if($UserModel->updatedata($uniid, $data)){
                                $session->setFlashdata('success', 'Password successfully updated!. You can now login');
                                return redirect()->to(base_url());
                            }
                            else{
                                $session->setFlashdata('error', '');
                                return redirect()->to(base_url());
                            }
                        }
                        else{
                            $data['validation'] = $this->validator;
                        }
                    }
                }
                else{
                    $data['error'] = 'Reset link was  expired!!';
                    // $session->setFlashdata('error', 'Reset link was  expired!!');
                }
            }
            else{
                $data['error'] = 'Opps! Unable to find your account!!';
            }
        }
        else{
            // $session->setFlashdata('error', 'Opps! Unable to handle your request at the moment');
            $data['error'] = 'Opps! Unauthorised access! ';
        }
        echo view('reset_pass', $data);
    }
    //--------------------------------------------------------------------

    
    //--------------------------------------------------------------------


    private function checkExpiryDate($time){       
        $currTime = now();
        $updatetime = strtotime($time);
        $diffTime = ($currTime - $updatetime)/60;

        if(800 > $diffTime){
            //register
            return true;
        }
        else{
            //expired
            return false;
        }
    }

    //--------------------------------------------------------------------

    public function logout(){
        session()->destroy();
        return redirect()->to(base_url());
    }

}

/**
 * Forgot Pass, 
 * Reset Pass
 * CHeck expiry date all works together..
 * The Reset Pass submits the data if there is no error
 * The form is displayed in the view only when there is no error
 */