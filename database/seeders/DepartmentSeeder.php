<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = [
            ['NAME' => 'Accounting',],
            ['NAME' => 'Business Development',],
            ['NAME' => 'Engineering',],
            ['NAME' => 'Human Resources',],
            ['NAME' => 'Legal',],
            ['NAME' => 'Marketing',],
            ['NAME' => 'Product Management',],
            ['NAME' => 'Sales',],
            ['NAME' => 'Training',],

        ];

        DB::table('departments')->insert($department);
    }
}
