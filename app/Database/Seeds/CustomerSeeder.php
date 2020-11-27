<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time; 

class CustomerSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // $data = [
        //     'name' => 'Maratul Bariroh',
        //     'address'    => 'Surabaya',
        //     'created_at' => Time::now(),
        //     'update_at' => Time::now()
        // ];

        $faker = \Faker\Factory::create('id_ID');
        for($i=0;$i < 100; $i++){
            $data = [
                'name' => $faker->name,
                'address' => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'update_at' =>Time::now()
            ];
            
            $this->db->table('customer')->insert($data);
        }

        // // Simple Queries
        // $this->db->query(
        //     "INSERT INTO customer (name, address, created_at, update_at) VALUES(:name:, :address, :create_at, :updated_at:)",
        //     $data
        // );

        // Using Query Builder
        // $this->db->table('customer')->insertBatch($data);
    }
}
