<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['product_name', 'price', 'description', 'photo', 'qty'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAllProducts()
    {
        $result = $this->get($this->table);
        return $result;
    }

    public function getData($id = false)
    {
        if (!$id) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }

    public function saveData($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function updateData($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->getWhere(['product_id' => $id]);
        return $builder->update($data);
    }

    public function deleteData($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['product_id', $id]);
    }
}
