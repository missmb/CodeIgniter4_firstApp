<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'addres'];

    public function search($keyword)
    {
        // $builder = $this->table('customer');
        // $builder->like('name', $keyword);
        // return $builder;

        return $this->table('name')->like('name', $keyword)->orlike('address', $keyword);
    }
}
