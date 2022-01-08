<?php


use App\User;
use App\VactionRequest;
use App\Vacation;
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
        // $this->call(UserSeeder::class);
        factory(User::class, 20)->create();
        factory(Vacation::class, 50)->create();
        factory(VactionRequest::class, 50)->create();
    }
}
