<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel
{
    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db = &$db;
    }

    function all(){
        return $this->db->table('stock')->get()->getResult();
    }

    //--------------------------------------------------------------------
        
    function minimal(){
        return $this->db->table('store')
                        ->groupBy('stock_id')
                        ->join('stock', 'store.stock_id = stock.id')
                        ->selectCount('stock_id')
                        ->get()
                        ->getResult();
        }

    //--------------------------------------------------------------------
        
    //    function store(){
        
    //     return $this->db->table('store')
    //                     ->groupBy('stock_id')
    //                     ->join('stock', 'store.stock_id = stock.id')
    //                     ->get()
    //                     ->getResult();
    //     }

    //--------------------------------------------------------------------

    function store(){
        // joint query of 3 or more table
        return $this->db->table('store')
                        ->groupBy('stock_id')
                        ->join('stock', 'store.stock_id = stock.id')
                        ->join('unit', 'stock.unit_id = unit.id')
                        ->join('category', 'stock.category_id = category.id')
                        ->get()
                        ->getResult();
        }

    //--------------------------------------------------------------------

        
     function count(){
        
        return $this->db->table('store')
                        ->groupBy('stock_id')
                        ->join('stock', 'store.stock_id = stock.id')
                        ->selectCount('stock_id')
                        ->get()
                        ->getResult();
        }

    //--------------------------------------------------------------------

        
    function stock(){
        //joint query of 2 tables
        return $this->db->table('stock')
                        ->join('unit', 'stock.unit_id = unit.id')
                        ->join('users', 'stock.user_id = users.id')
                        ->join('supplier', 'stock.supplier_id = supplier.id')
                        ->join('order', 'stock.order_id = order.id')
                        ->join('category', 'stock.category_id = category.id')
                        ->get()
                        ->getResult();
    }

}
