<?php namespace App\Controllers;

// import models

use App\Models\UserModel;
use App\Models\StoreModel;
use App\Models\CategoryModel;
use App\Models\OrderModel;
use App\Models\StockModel;
use App\Models\SupplierModel;
use App\Models\UnitModel;
use App\Models\CustomModel;


// import configurations
use Config\Services;
use Config\Database;

class Master extends BaseController
{

	public function __construct()
    {
       helper(['form, url']); 
    }

	public function index() {
        // initialize validation
		 $validation =  \Config\Services::validation();
		 //initilize form 
		 helper(['form', 'url']);
		 // initialize session data
		 $session = session();
		 $db = \Config\Database::connect();
		
	
		//protect url begins
		if(!  session()->get('isLoggedIn'))
        return  redirect()->to(base_url());

        
		$data['title'] = 'Master || Store Master';
		$StockModel = new StockModel();
		$CategoryModel = new CategoryModel();
		$UnitModel = new UnitModel();
		$SupplierModel = new SupplierModel();
		$OrderModel = new OrderModel();
		$CustomModel = new CustomModel($db);

		// var_dump(date('Y-m-d h:i:s')); die;
		// $data['totalStock'] = $StockModel->findAll();
		$data['totalStock'] = $CustomModel->stock();
		$data['totalCategory'] = $CategoryModel->findAll();
		$data['totalUnit'] = $UnitModel->findAll();
		$data['totalSupplier'] = $SupplierModel->findAll();
		$data['totalOrder'] = $OrderModel->findAll();
		$data['allStock'] = $StockModel->findAll();
		$UserModel = new UserModel();
		$data['userdata'] = $UserModel->getOne($session->get('uniid'));

        return view('master/master', $data);
	}
	
	//--------------------------------------------------------------------

	public function addstock(){
		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		
	   //protect url begins
	   if(!  session()->get('isLoggedIn'))
	   return  redirect()->to(base_url());
		// var_dump($this->request->getPost()); die;
	   if($this->request->getMethod() == 'post'){
		   $rules = [
			   'name' => 'required',
			   'category' => 'required',
			   'supplier' => 'required',
			   'unit' => 'required',
			   'order' => 'required',
		   ];
		   
		    if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
		   else{
			   $StockModel = new StockModel();

			   $data = [
				   'stock_name' => $_POST['name'],
				   'category_id' => $_POST['category'],
				   'supplier_id' => $_POST['supplier'],
				   'unit_id' => $_POST['unit'],
				   'order_id' => $_POST['order'],
				   'user_id' => $session->get('id')
			   ];

		
			   $StockModel->insert($data);
			   $session->setFlashdata('success', 'Stock Created!');
			   return redirect()->to(base_url('master'));
		   }
	   }
	}

	//--------------------------------------------------------------------

	public function addcategory(){
		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		
	   //protect url begins
	   if(!  session()->get('isLoggedIn'))
	   return  redirect()->to(base_url());

	   if($this->request->getMethod() == 'post'){
		   $rules = [
			   'name' => 'required'
		   ];

		    if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
		   else{
			   $CategoryModel = new CategoryModel();

			   $data = [
				   'category_name' => $_POST['name']
			   ];

			   $CategoryModel->insert($data);
			   $session->setFlashdata('success', 'Category Created!');
			   return redirect()->to(base_url('master'));
		   }
	   }
	}

	//--------------------------------------------------------------------

	public function addunit(){
		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		
	   //protect url begins
	   if(!  session()->get('isLoggedIn'))
	   return  redirect()->to(base_url());

	   if($this->request->getMethod() == 'post'){
		   $rules = [
			   'name' => 'required'
		   ];

		    if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
		   else{
			   $UnitModel = new UnitModel();

			   $data = [
				   'unit_name' => $_POST['name']
			   ];

			   $UnitModel->insert($data);
			   $session->setFlashdata('success', 'Unit Created!');
			   return redirect()->to(base_url('master'));
		   }
	   }
	}

	//--------------------------------------------------------------------

	public function addsupplier(){
		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		
	   //protect url begins
	   if(!  session()->get('isLoggedIn'))
	   return  redirect()->to(base_url());

	   if($this->request->getMethod() == 'post'){
		   $rules = [
			   'name' => 'required'
		   ];

		    if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
		   else{
			   $SupplierModel = new SupplierModel();

			//    var_dump($this->request->getPost()); die;
			   $data = [
				   'supplier_name' => $_POST['name'],
				   'address' => $_POST['address'],
				   'description' => $_POST['description']
			   ];

			   $SupplierModel->insert($data);
			   $session->setFlashdata('success', 'Supplier Created!');
			   return redirect()->to(base_url('master'));
		   }
	   }
	}

	//--------------------------------------------------------------------

	public function addorder(){
		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		
	   //protect url begins
	   if(!  session()->get('isLoggedIn'))
	   return  redirect()->to(base_url());

	   if($this->request->getMethod() == 'post'){
		   $rules = [
			   'name' => 'required'
		   ];

		    if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
		   else{
			   $OrderModel = new OrderModel();

			//    var_dump($this->request->getPost()); die;
			   $data = [
				   'ord_name' => $_POST['name'],
			   ];

			   $OrderModel->insert($data);
			   $session->setFlashdata('success', 'Shelve Created!');
			   return redirect()->to(base_url('master'));
		   }
	   }
	}


	/*
	** Edit of master begins
	** Here
	*/

	public function editstock(){
		$data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();

		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			$rules = [
				'id' => 'required',
				'name' => 'required',
				'category' => 'required',
				'supplier' => 'required',
				'unit' => 'required',
				'order' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
			else{
				
				$StockModel = new StockModel();

				$data = [
					'stock_name' => $_POST['name'],
					'category_id' => $_POST['category'],
					'supplier_id' => $_POST['supplier'],
					'unit_id' => $_POST['unit'],
					'order_id' => $_POST['order'],
					'user_id' => $session->get('id')
				];

				$StockModel->update($this->request->getPost('id'), $data);
				$session->setFlashdata('success', 'Stock Edited');
				return redirect()->to(base_url('master'));			
			}
		}
	}

	//--------------------------------------------------------------------


	public function editcategory(){
		$data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();

		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			$rules = [
				'id' => 'required',
				'name' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
			else{
				
				$CategoryModel = new CategoryModel();

				$data = [
					'category_name' => $_POST['name'],
				];

				$CategoryModel->update($this->request->getPost('id'), $data);
				$session->setFlashdata('success', 'Category Edited');
				return redirect()->to(base_url('master'));			}
		}
	}

	//--------------------------------------------------------------------

	public function editsupplier(){
		$data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();

		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			$rules = [
				'id' => 'required',
				'name' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
			else{
				
				$SupplierModel = new SupplierModel();

				$data = [
					'supplier_name' => $_POST['name'],
				];

				$SupplierModel->update($this->request->getPost('id'), $data);
				$session->setFlashdata('success', 'Supplier Edited');
				return redirect()->to(base_url('master'));			}
		}
	}

	//--------------------------------------------------------------------

	public function editunit(){
		$data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();

		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			$rules = [
				'id' => 'required',
				'name' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
			else{
				
				$UnitModel = new UnitModel();

				$data = [
					'unit_name' => $_POST['name'],
				];

				$UnitModel->update($this->request->getPost('id'), $data);
				$session->setFlashdata('success', 'Unit Edited');
				return redirect()->to(base_url('master'));			}
		}
	}

	//--------------------------------------------------------------------

	public function editorder(){
		$data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();

		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'post'){
			$rules = [
				'id' => 'required',
				'name' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
				return redirect()->to(base_url('master'));
			}
			else{
				
				$OrderModel = new OrderModel();

				$data = [
					'ord_name' => $_POST['name'],
				];

				$OrderModel->update($this->request->getPost('id'), $data);
				$session->setFlashdata('success', 'Shelve Edited');
				return redirect()->to(base_url('master'));			}
		}
	}

	//--------------------------------------------------------------------

	
	/*
	** Delete of master begins
	** Here
	*/

	public function deleteStock($stock_id){
		// $data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
	   if(! session()->get('isLoggedIn'))
		   return redirect()->to(base_url());

		if($this->request->getMethod() == 'get'){
			$StockModel = new StockModel();
			$StockModel->delete($stock_id);
			$session->setFlashdata('error','Stock Deleted');
			return redirect()->to(base_url('master'));
		}
	}

	//--------------------------------------------------------------------

	public function deleteCategory($category_id){
		// $data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
	   if(! session()->get('isLoggedIn'))
		   return redirect()->to(base_url());

		if($this->request->getMethod() == 'get'){
			$CategoryModel = new CategoryModel();
			$CategoryModel->delete($category_id);
			$session->setFlashdata('error','Category Deleted');
			return redirect()->to(base_url('master'));
		}
	}

	
	//--------------------------------------------------------------------

	public function deleteSupplier($supplier_id){
		// $data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
	   if(! session()->get('isLoggedIn'))
		   return redirect()->to(base_url());

		if($this->request->getMethod() == 'get'){
			$SupplierModel = new SupplierModel();
			$SupplierModel->delete($supplier_id);
			$session->setFlashdata('error','Supplier Deleted');
			return redirect()->to(base_url('master'));
		}
	}

	//--------------------------------------------------------------------

	public function deleteUnit($deleteUnit){
		// $data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'get'){
			$UnitModel = new UnitModel();
			$UnitModel->delete($deleteUnit);
			$session->setFlashdata('error','Unit Deleted');
			return redirect()->to(base_url('master'));
		}
	}

	//--------------------------------------------------------------------

	public function deleteOrder($deleteOrder){
		// $data['title'] = 'Home || Store Master';

		// initialize validation
		$validation =  \Config\Services::validation();
		//initilize form 
		helper(['form', 'url']);
		// initialize session data
		$session = session();
		$db = \Config\Database::connect();
		if(! session()->get('isLoggedIn'))
			return redirect()->to(base_url());

		if($this->request->getMethod() == 'get'){
			$OrderModel = new OrderModel();
			$OrderModel->delete($deleteOrder);
			$session->setFlashdata('error','Order Deleted');
			return redirect()->to(base_url('master'));
		}
	}
}