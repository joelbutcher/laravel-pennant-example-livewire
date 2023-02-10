<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Database\Seeder;
use Laravel\Pennant\Feature;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Feature::activate('teams', );
        Role::create(['name' => 'admin']);

        (new CreateNewUser())->create([
           'name' => 'Joel Butcher',
           'email' => 'joel@joelbutcher.com',
           'password' => 'password',
           'password_confirmation' => 'password',
        ])->assignRole('admin');
    }
}
