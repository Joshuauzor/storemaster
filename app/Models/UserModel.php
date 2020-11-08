<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['firstname','lastname', 'email','profile_pics', 'sex', 'password', 'phone', 'position','uniid', 'activation_date', 'status', 'uniid'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;

    public function updatestatus($uniid, $data){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $builder->update($data);
        $result = $builder->get();

        return $result;
    }

    public function updateAvatar($uniid, $path){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $builder->update(['profile_pics' => $path]);
        $result = $builder->get();

        return $result;
    }

    public function getOne($uniid){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $result = $builder->get();
        return $result->getRow();
    }

    public function checkemail($email){
        $builder = $this->db->table('users');
        $builder->where('email', $email);
        $result = $builder->get();
        return $result->getRow();
    }
    
    public function updatedata($uniid, $data){
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);
        $builder->update($data);
        $result = $builder->get();

        return $result;
    }
}