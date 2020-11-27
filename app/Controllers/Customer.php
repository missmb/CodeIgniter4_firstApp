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

        $data = [
            'title' => 'List Customer',
            // 'customer' => $this->customerModel->findAll()
            'customer' => $this->customerModel->paginate(7, 'customer'),
            'pager' => $this->customerModel->pager,
            'currentPage' => $currentPage
        ];

        return view('Customer/index', $data);
    }

}
