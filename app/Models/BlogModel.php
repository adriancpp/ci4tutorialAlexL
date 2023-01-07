<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'posts';
    protected $primaryKey = 'post_id';

//    protected $useAutoIncrement = true;
//
//    protected $returnType     = 'array';
//    protected $useSoftDeletes = true;

    protected $allowedFields = ['post_title', 'post_content'];

//    // Dates
    protected $useTimestamps = true;
//    protected $dateFormat    = 'datetime';
    protected $createdField  = 'post_created_at';
    protected $updatedField  = 'post_updated_at';
//    protected $deletedField  = 'deleted_at';
//
//    // Validation
//    protected $validationRules      = [];
//    protected $validationMessages   = [];
//    protected $skipValidation       = false;
//    protected $cleanValidationRules = true;
    protected $beforeInsert = ['checkName'];
    //afterInsert
    //beforeUpdate
    //afterUpdate
    //afterFind
    //afterDelete

    //for insert password maybe use:   protected $beforeInsert = ['hashPassword'];

    public function checkName(array $data)
    {
        $newTitle = $data['data']['post_title'].' Extra Features';
        $data['data']['post_title'] = $newTitle;

        return $data;
    }

//    public function hashPassword(array $data)
//    {
//        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
//
//        return $data;
//    }
}