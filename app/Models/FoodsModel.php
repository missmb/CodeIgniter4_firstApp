<?php namespace App\Models;

use CodeIgniter\Model;

class FoodsModel extends Model
{
    protected $table = 'foods';
	protected $useTimestamps = true;

    public function getFood($slug = false)
    {
        if ($slug == false){
            return $this->findAll();
        }
        //not use "else" because if return outomatically out of condition
        return $this->where(['slug' => $slug])->first();
    }
}