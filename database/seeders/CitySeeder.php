<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Countries
        $countries = Country::pluck('id', 'name')->toArray();

        // Open CSV file
        $file = fopen(storage_path('csv/worldcities.csv'), 'r');

        // Skip first line
        fgetcsv($file);

        // Read data from CSV file
        while (($data = fgetcsv($file)) !== false) {
            $name = $data[1];
            $country_name = $data[4];
            $country = Country::where('name', $country_name)->first();
            $city = City::where('name', $name)->where('country_id', $country->id)->first();

            // Insert data into cities table
            if ( ! $city) {
                $city = City::create([
                    'country_id' => $countries[$data[4]], // $country->id,
                    'name' => $name,
                    'lat' => $data[2],
                    'lng' => $data[3],
                    'population' => empty( $data[9] ) ? null : $data[9],
                ]);
            }
        }

        // Close CSV file
        fclose($file);
    }
}
