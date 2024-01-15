<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Open CSV file
        $file = fopen(storage_path('csv/worldcities.csv'), 'r');

        // Skip first line
        fgetcsv($file);

        // Read data from CSV file
        while (($data = fgetcsv($file)) !== false) {
            $name = $data[4];

            $country = Country::where('name', $name)->first();

            // Insert data into countries table
            if ( ! $country) {
                $country = Country::create([
                    'name' => $name,
                    'iso2' => $data[5],
                    'iso3' => $data[6],
                ]);
            }
        }

        // Close CSV file
        fclose($file);
    }
}
