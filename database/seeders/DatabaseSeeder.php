<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Doctor::factory(10)->create();

        Doctor::create([
            'name' => 'Doctor',
            'last_name' => 'Test',
            'email' => 'test@example.com',
            "carcinocheck_id" => "VFB848",
            "country" => "Brasil",
            "document" => "34523454532",
            "medical_license_number" => "123456",
            "medical_institution" => "Instituição teste",
            "address" => "Rua teste, 123",
            "phone" => "51984874567",
            'password' => Hash::make('password123'),
        ]);
    }
}
