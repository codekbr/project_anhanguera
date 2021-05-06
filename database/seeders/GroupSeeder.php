<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_admins')->insert([
            'name' => 'Administrador',
            'admin' => 1,
        ]);

        DB::table('group_admins')->insert([
            'name' => 'Usuário',
            'admin' => 0,
        ]);
    }
}
