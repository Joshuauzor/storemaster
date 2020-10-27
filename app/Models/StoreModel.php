<?php namespace App\Models;

use CodeIgniter\Model;

class StoreModel extends Model
{
    protected $table      = 'store';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['model','barcode','stock_id', 'quantity', 'user_id', 'remark', 'rack_id','supplier_id','unit_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


}

