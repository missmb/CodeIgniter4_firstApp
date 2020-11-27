<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Config\Config;

class Customer extends BaseController
{
    protected $customerModel;
    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_customer') ? $this->request->getVar('page_customer') : 1 ;

        $keyword = $this->request->getVar('keyword');
        if($keyword){
            $customer = $this->customerModel->search($keyword);
        }else{
            $customer = $this->customerModel;
        }
        $data = [
            'title' => 'List Customer',
            // 'customer' => $this->customerModel->findAll()
            'customer' => $customer->paginate(7, 'customer'),
            'pager' => $this->customerModel->pager,
            'currentPage' => $currentPage
        ];

        return view('Customer/index', $data);
    }

}
