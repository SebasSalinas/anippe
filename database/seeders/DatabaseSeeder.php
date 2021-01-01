<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrganisationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(TaskSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
