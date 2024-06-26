<?php

namespace Database\Seeders;

use App\Models\Contract;
use App\Models\Employee;
use App\Models\Employer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::factory()
            ->count(50)
            ->create();
    }
}
