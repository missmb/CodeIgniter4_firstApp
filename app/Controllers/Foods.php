<?php

namespace App\Controllers;

use App\Models\FoodsModel;
use CodeIgniter\Config\Config;

class Foods extends BaseController
{
    protected $foodsModel;
    public function __construct()
    {
        $this->foodsModel = new FoodsModel();
    }
    public function index()
    {
        // $food = $this->foodsModel->findAll();

        $data = [
            'title' => 'List Food',
            'food' => $this->foodsModel->getFood()
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

    public function detail($slug)
    {
        // $food = $this->foodsModel->where(['slug' => $slug])->first();
        // $food = $this->foodsModel->getFood($slug);
        // var_dump($food);
        $data = [
            'title' => 'Detail Food',
            'food' => $this->foodsModel->getFood($slug)
        ];

        if (empty($data['food'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('the name of ' . $slug . ' is not found');
        }
        return view('foods/detail', $data);
    }

    public function create()
    {
        // session(); 
        // session change to baseController
        $data = [
            'title' => 'Form Add Data Food',
            'validation' => \Config\Services::validation()
        ];

        return view('foods/create', $data);
    }

    public function save()
    {
        // var_dump($this->request->getVar());

        // validasi input
        if (!$this->validate([
            'title' => 'required|is_unique[foods.title]',
            'origin' => [
                'rules' => 'required|is_unique[foods.origin]',
                'errors' => [
                    'required' => '{field} food must fill.',
                    'is_unique' => '{field} food is exis'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/food/create')->withInput()->withInput('validation', $validation);
            // $data['validation'] = $validation;
            // return view('/food/create');
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->foodsModel->save([
            'title' => $this->request->getVar(('title')),
            'slug' => $slug,
            'origin' => $this->request->getVar(('origin')),
            'detail' => $this->request->getVar(('detail')),
            'cover' => $this->request->getVar(('cover'))
        ]);

        session()->setFlashdata('message', 'Success add Data');

        return redirect()->to('/foods');
    }

    public function delete($id)
    {
        $this->foodsModel->delete($id);

        session()->setFlashdata('message', 'Success deleted Data');

        return redirect()->to('/foods');
    }

    public function edit($slug)
    {
        // session(); 
        // session change to baseController
        $data = [
            'title' => 'Form Edit Data Food',
            'validation' => \Config\Services::validation(),
            'food' => $this->foodsModel->getFood($slug)
        ];

        return view('foods/edit', $data);
    }

    public function update($id)
    {
        // var_dump($this->request->getVar());

                    //check title
                    $oldFood = $this->foodsModel->getFood($this->request->getVar('slug'));
                    if ($oldFood['title'] == $this->request->getVar('slug')){
                        $rule_title = 'required';
                    }else{
                        $rule_title = 'required|is_unique[foods.title]';
                    }
                

        // validasi input
        if (!$this->validate([

            'title' => [
                'rules' => $rule_title,
                'errors' => [
                    'required' => '{field} food must fill.',
                    'is_unique' => '{field} food is exis'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/food/edit/' . $this->request->getVar('slug'))->withInput()->withInput('validation', $validation);
            // $data['validation'] = $validation;
            // return view('/food/create');
        }

        $slug = url_title($this->request->getVar('title'), '-', true);
        $this->foodsModel->save([
            'id' => $id,
            'title' => $this->request->getVar(('title')),
            'slug' => $slug,
            'origin' => $this->request->getVar(('origin')),
            'detail' => $this->request->getVar(('detail')),
            'cover' => $this->request->getVar(('cover'))
        ]);

        session()->setFlashdata('message', 'Success edit Data');

        return redirect()->to('/foods');
    }
}
