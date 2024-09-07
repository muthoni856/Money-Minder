<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeders extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'email'    => 'admin@moneyminder.com',
                'password' => password_hash('admin123', PASSWORD_DEFAULT),
                'role'     => 'admin',
            ],
            [
                'username' => 'John',
                'email'    => 'john@example.com',
                'password' => password_hash('john123', PASSWORD_DEFAULT),
                'role'     => 'user',
            ],
            [
                'username' => 'Doe',
                'email'    => 'doe@example.com',
                'password' => password_hash('doe123', PASSWORD_DEFAULT),
                'role'     => 'user',
            ],
        ];

        $this->db->table('users')->insertBatch($data);
    }
}
