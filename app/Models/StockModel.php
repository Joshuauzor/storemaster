<?php namespace App\Models;

use CodeIgniter\Model;

class StockModel extends Model
{
    protected $table      = 'stock';
    protected $primaryKey = 'id';


    protected $allowedFields = ['id','stock_name','category_id','supplier_id','unit_id','order_id','user_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

}