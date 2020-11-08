<?php namespace App\Controllers;

// import models

use App\Models\UserModel;
use App\Models\StoreModel;
use App\Models\CategoryModel;
use App\Models\CustomModel;
use App\Models\OrderModel;
use App\Models\StockModel;
use App\Models\SupplierModel;
use App\Models\UnitModel;


// import configurations
use Config\Services;
use Config\Database;

class Home extends BaseController
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

		//protect url begins
		if(!  session()->get('isLoggedIn'))
		return  redirect()->to(base_url());
		//protect url end
		
		$data['title'] = 'Home || Store Master';
		$StoreModel = new StoreModel();

		$StockModel = new StockModel();
		$CategoryModel = new CategoryModel();
		$UnitModel = new UnitModel();
		$SupplierModel = new SupplierModel();
		$OrderModel = new OrderModel();
		$CustomModel = new CustomModel($db);
		$UserModel = new UserModel();

		$data['totalStock'] = $CustomModel->stock();
		$data['totalCategory'] = $CategoryModel->findAll();
		$data['totalUnit'] = $UnitModel->findAll();
		$data['totalSupplier'] = $SupplierModel->findAll();
		$data['totalOrder'] = $OrderModel->findAll();
		$data['allStock'] = $StockModel->findAll();
		$data['userdata'] = $UserModel->getOne($session->get('uniid'));


		// Rack value
		$data['rack_1'] = $StoreModel->where('rack_id', '1')->findAll();
		$data['rack_2'] = $StoreModel->where('rack_id', '2')->findAll();
		$data['rack_3'] = $StoreModel->where('rack_id', '3')->findAll();
		$data['rack_4'] = $StoreModel->where('rack_id', '4')->findAll();
		$data['rack_5'] = $StoreModel->where('rack_id', '5')->findAll();
		$data['rack_6'] = $StoreModel->where('rack_id', '6')->findAll();
		$data['rack_7'] = $StoreModel->where('rack_id', '7')->findAll();
		$data['rack_8'] = $StoreModel->where('rack_id', '8')->findAll();
		$data['rack_9'] = $StoreModel->where('rack_id', '9')->findAll();
		$data['rack_10'] = $StoreModel->where('rack_id', '10')->findAll();
		$data['rack_11'] = $StoreModel->where('rack_id', '11')->findAll();
		$data['rack_12'] = $StoreModel->where('rack_id', '12')->findAll();
		$data['rack_0'] = $StoreModel->where('rack_id', 'Others')->findAll();

		$data['lessgoods'] = $StoreModel->findAll();
		
		echo view('home_view', $data);
     
	}

	//--------------------------------------------------------------------

	public function totalStock(){

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
		//protect url end
		$data['title'] = 'Total Stock || Store Master';

		$StoreModel = new StoreModel();
		// $StoreModel = $StoreModel->where('id', $session->get('id'))->findAll();
		$data['totalStock'] = $StoreModel->findAll();
		echo view('totalStock', $data);
	}

	//--------------------------------------------------------------------



	//--------------------------------------------------------------------
	// Exporting to excel

	// public function export(){
	// 	$StoreModel = new StoreModel();
	// 	$file_name = 'total_stock_on'.date('Ymd').'.csv';
	// 	header("Content-Description: File Transfer");
	// 	header("Content-Disposition: attachment; filename=$file_name");
	// 	header("Content-Type: application/csv;");
	// 	$total_stock = $StoreModel->findAll();

	// 	$file = fopen('php://output', 'w');

	// 	$header = array('S/N', 'NAME/MODEL', 'QUANTITY', 'RACK NUMBER', 'REMARK');

	// 	fputcsv($file, $header);

	// 	foreach($total_stock as $row){
	// 		fputcsv($file, $row);
	// 	}
	// 	fclose($file);
	// 	exit;
	// }


	//--------------------------------------------------------------------
		// export csv
	public function export(){
		$db = \Config\Database::connect();
		$CustomModel = new CustomModel($db);
		$count = $CustomModel->count();
		$StoreItem = $CustomModel->store();
		$file_name = 'total_stock_on_'.date('Ymd').'.csv';
		header("Content-Description: File Transfer");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Content-Type: application/csv;");

		$results = array();
		foreach($StoreItem as $key => $row){
			$newArr['id'] = $row->id;
			$newArr['stock'] = $row->stock_name;
			$newArr['unit_name'] = $row->unit_name;
			$newArr['category_name'] = $row->category_name;

			// second array for count
			$newArr['quantity'] = $count[$key]->stock_id;
			//ends here
			$data['results'] = $newArr;
			$results[] = $newArr;
		
		}
		
		// var_dump($data['storeresults']); die;

		$file = fopen('php://output', 'w');

		$header = array('S/N', 'STOCK', 'UNIT', 'CATEGORY', 'QUANTITY');

		fputcsv($file, $header);

		foreach($results as $row){
			fputcsv($file, $row);
		}
		fclose($file);
		exit;
	}

	//--------------------------------------------------------------------
	// upload file
	public function uploadavatar(){
		
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
		//protect url end
		$data['title'] = 'Profile || StoreMaster';
		$StoreModel = new StoreModel();

		$StockModel = new StockModel();
		$CategoryModel = new CategoryModel();
		$UnitModel = new UnitModel();
		$SupplierModel = new SupplierModel();
		$OrderModel = new OrderModel();
		$CustomModel = new CustomModel($db);
		$UserModel = new UserModel();

		$data['totalStock'] = $CustomModel->stock();
		$data['totalCategory'] = $CategoryModel->findAll();
		$data['totalUnit'] = $UnitModel->findAll();
		$data['totalSupplier'] = $SupplierModel->findAll();
		$data['totalOrder'] = $OrderModel->findAll();
		$data['allStock'] = $StockModel->findAll();
		$check = $UserModel->getOne($session->get('uniid'));
		$data['userdata'] = $UserModel->getOne($session->get('uniid'));

		// var_dump($data['userdetails'] ); die;
		// var_dump($check->id); die;
	

		// begin


		if($this->request->getMethod() == 'post'){

			$rules = [
				'avatar' => 'uploaded[avatar] |max_size[avatar,1024] |ext_in[avatar,png,jpg]'
			];

			if($this->validate($rules)){
				$file = $this->request->getFile('avatar');
				if($file->isValid() && !$file->hasMoved()){
					// get random name generate random name for image
					if($file->move(FCPATH.'public\images', $file->getRandomName())){
						$path = base_url().'/public/images/'.$file->getName();
						// save to db
						$status = $UserModel->updateAvatar($session->get('uniid'), $path); 
						if($status == true){
							$session->setFlashdata('success', 'Avatar successfully updated');
							return redirect()->to(current_url());
						}
						else{
							$session->setFlashdata('error', 'Sorry! Unable to upload Avatar');
							return redirect()->to(current_url());
						}
					}
					else{
						// failed
						$session->setFlashdata('error', $file->getErrorString());
						return redirect()->to(current_url());
					}	 
				}
				else{
					$session->setFlashdata('error', 'OPPS!, You have uploaded an invalid file');
					return redirect()->to(current_url());
				}
			}
			else{
				$data['validation'] = $this->validator; 
			}
		}
		echo view('profile', $data);
	}
}

/**
 * Exporting involves getting data as array and passing as 
 * done above
 */




