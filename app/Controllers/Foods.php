<?php namespace App\Controllers;

use App\Models\FoodsModel;

class Foods extends BaseController
{
    protected $foodsModel;
    public function __construct()
    {
        $this->foodsModel = new FoodsModel();
    }
    public function index(){
        $food = $this->foodsModel->findAll();

        $data = [
            'title' => 'List Food',
            'food' => $food
        ];

        //How to Connect db without model
        // $db = \Config\Database::connect();
        // $foods = $db->query("SELECT * FROM foods");
        // foreach($foods->getResultArray() as $row){
        //     d($row);
        // }
        // var_dump($foods);

        // $foodsModel = new \App\Models\FoodsModel();
        // $foodsModel = new FoodsModel();


        return view('Foods/index', $data);
    }

}