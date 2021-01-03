<?php

namespace Database\Seeders;

use App\Models\Organisation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Organisation::create([
            'uuid' => Str::uuid(),
            'subdomain' => 'test',
            'name' => 'Test',
            'country_id' => 1,
            'street' => 'Test',
            'place' => 'Test',
            'user_id' => 1
        ]);
    }
}
