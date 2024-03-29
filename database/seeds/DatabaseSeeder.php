<?php

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
        $this->call(VoyagerDatabaseSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(ServicesTableSeeder::class);
        $this->call(ModelsTableSeeder::class);
        $this->call(DiligencesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(TvTableSeeder::class);
    }
}
