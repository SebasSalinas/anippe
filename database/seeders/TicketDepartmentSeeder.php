<?php

namespace Database\Seeders;

use App\Models\TicketDepartment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TicketDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketDepartment::create([
            'uuid' => Str::uuid()->toString(),
            'code' => 'FIN',
            'name' => 'Finances',
            'description' => 'Have a question about invoices?',
            'organisation_id' => 1,
            'created_at' => now()
        ]);

        TicketDepartment::create([
            'uuid' => Str::uuid()->toString(),
            'code' => 'SUP',
            'name' => 'Support',
            'description' => 'Have a question about out projects?',
            'organisation_id' => 1,
            'created_at' => now()
        ]);
    }
}
