<?php namespace App\Controllers;

class Pages extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | MissMb',
			'tes' => ['one','two','tree']
		];
		return view('pages/home',$data);
	}
	public function about()
	{
		$data = [
			'title' => 'About Me'
		];
		return view('pages/about',$data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact Us',
			'address' => [
				[
					'type' => 'Home',
					'address' => 'Surabaya',
					'country' => 'Indonesia'
				],
				[
					'type' => 'Office',
					'address' => 'Seattle',
					'country' => 'USA'
				],

			]
		];
		return view('pages/contact',$data);
	}
	//--------------------------------------------------------------------

}
