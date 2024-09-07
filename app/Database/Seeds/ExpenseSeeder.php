<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        // Data to be seeded
        $data = [
            [
                'date'      => '2024-09-01',
                'category'  => 'Food',
                'amount'    => 50.00,
                'user_id'   => 7, 
            ],
            [
                'date'      => '2024-09-02',
                'category'  => 'Transport',
                'amount'    => 20.00,
                'user_id'   => 8, 
            ],
            [
                'date'      => '2024-09-03',
                'category'  => 'Clothes',
                'amount'    => 100.00,
                'user_id'   => 9, 
            ],
          
        ];
        $this->db->table('expenses')->insertBatch($data);
    }
}
