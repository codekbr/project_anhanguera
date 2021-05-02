<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marcos Sandro',
            'group_id' => 1,
            'email' => 'marcos.souza@otimogestor.com.br',
            'password' => Hash::make('teste123'),
        ]);
    }
}
