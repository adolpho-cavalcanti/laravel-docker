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
            ['id' => 3, 'name' => 'Marcos Frota Ribeiro', 'email' => 'ribeiro@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 2],
            ['id' => 4, 'name' => 'Raphael Souza Santos', 'email' => 'rsantos@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 5, 'name' => 'Pedro Paulo Mota', 'email' => 'ppmota@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 6, 'name' => 'Winder Carvalho da Silva', 'email' => 'winder@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 3],
            ['id' => 7, 'name' => 'Maria da Penha Albuquerque', 'email' => 'mpa@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 3],
            ['id' => 8, 'name' => 'Rafael Garcia Souza', 'email' => 'rgsouza@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 3],
            ['id' => 9, 'name' => 'Tabata Costa', 'email' => 'tabata_costa@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 2],
            ['id' => 10, 'name' => 'Ronil Camarote', 'email' => 'camarote@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 11, 'name' => 'Joaquim Barbosa', 'email' => 'barbosa@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 12, 'name' => 'Eveline Maria Alcantra', 'email' => 'ev_alcantra@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 2],
            ['id' => 13, 'name' => 'João Paulo Vieira', 'email' => 'jpvieria@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 1],
            ['id' => 14, 'name' => 'Carla Zamborlini	', 'email' => 'zamborlini@gmail.com	', 'password' => bcrypt('athenas@1212'), 'category_id' => 3],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
