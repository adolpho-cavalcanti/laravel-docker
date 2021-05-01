<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'name' => 'Jorge da Silva', 'email' => 'jorge@terra.com.br', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 2, 'name' => 'Flavia Monteiro', 'email' => 'flavia@globo.com', 'password' => bcrypt('athenas@1212'), 'category_id' => 2],
            ['id' => 3, 'name' => 'Marcos Frota Ribeiro', 'email' => 'ribeiro@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 3],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
