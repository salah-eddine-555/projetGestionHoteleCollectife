<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //`
        DB::table('roles')->insert([
            ['name' => 'client'],
            ['name' => 'gerant'],
            ['name' => 'admin']
        ]);
    }
}
