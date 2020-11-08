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

class Store extends BaseController
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

        $StockModel = new StockModel();
		$CategoryModel = new CategoryModel();
		$UnitModel = new UnitModel();
		$SupplierModel = new SupplierModel();
		$OrderModel = new OrderModel();
		$StoreModel = new StoreModel();
		$UserModel = new UserModel();
		// custom
		$CustomModel = new CustomModel($db);
		// 
		$UserModel = new UserModel();
		$data['userdata'] = $UserModel->getOne($session->get('uniid'));

		// var_dump( $CustomModel->store()); die;
		// 
		$count = $CustomModel->count();
		$StoreItem = $CustomModel->store();
		$test = $CustomModel->minimal();
		// var_dump($StoreItem); die;
		// 
		$data['test'] = $CustomModel->count();
        
		$data['StoreItem']	= $CustomModel->store();
		$data['totalStock'] = $CustomModel->stock();
		$data['allStock'] = $StockModel->findAll();
		$data['totalCategory'] = $CategoryModel->findAll();
		$data['totalUnit'] = $UnitModel->findAll();
		$data['totalSupplier'] = $SupplierModel->findAll();
		$data['totalOrder'] = $OrderModel->findAll();
        
		$data['title'] = 'All Store || Store Master';

		// var_dump($StoreItem); die;
		$results = array();
		foreach($StoreItem as $key => $row){
			// $newArr['name'] = $row['firstname'];
			$newArr['stock'] = $row->stock_name;
			$newArr['barcode'] = $row->barcode;
			$newArr['unit_name'] = $row->unit_name;
			$newArr['category_name'] = $row->category_name;

			// second array for count
			$newArr['quantity'] = $count[$key]->stock_id;
			//ends here
			$data['results'] = $newArr;
			$results[] = $newArr;
			$data['storeresults'] = $results;
			// var_dump($data['storeresults']);
		}

		// var_dump($data['storeresults']); die;


		if($this->request->getMethod() == 'post'){
			$rules = [
				'stock' => 'required',
				'barcode' => 'required',
			];

			if(! $this->validate($rules)){
				$data['validation'] = $this->validator;
			}
			else{
				$data = [
					'stock_id' => $_POST['stock'],
					'barcode' => $_POST['barcode']
				];

				// 
				$StoreModel->insert($data);
				$session->setFlashdata('success', 'Store Added');
				return redirect()->to(base_url('store'));
			}
		}
    
        return view('store/all', $data);
	}
	
	//--------------------------------------------------------------------

	// public function deleteStock($stock_id){
	// 	// $data['title'] = 'Home || Store Master';

	// 	// initialize validation
	// 	$validation =  \Config\Services::validation();
	// 	//initilize form 
	// 	helper(['form', 'url']);
	// 	// initialize session data
	// 	$session = session();
	// 	$db = \Config\Database::connect();
	//    if(! session()->get('isLoggedIn'))
	// 	   return redirect()->to(base_url());

	// 	if($this->request->getMethod() == 'get'){
	// 		$StockModel = new StockModel();
	// 		$StockModel->delete($stock_id);
	// 		$session->setFlashdata('error','Stock Deleted');
	// 		return redirect()->to(base_url('master'));
	// 	}
	// }
}